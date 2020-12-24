<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\User;
use App\Profile;
use Validator;
class AuthController extends Controller
{
  private $apiToken;
  public function __construct()
  {
    // Unique Token
    $this->apiToken = uniqid(base64_encode(str_random(60)));
  }
  /**
   * Client Login
   */
  public function postLogin(Request $request)
  {
    // Validations
    $rules = [
      'email'=>'required|email',
      'password'=>'required|min:8'
    ];
    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
      // Validation failed
      return response()->json(['status' => 'fail','result' => $validator->messages()]);
    } else {
      // Fetch User
      $user = User::with('profile')->where('email',$request->email)->first();
      if($user) {
        // Verify the password
        if( password_verify($request->password, $user->password) ) {
          // Update Token
          $postArray = ['api_token' => $this->apiToken];
          $login = User::where('email',$request->email)->update($postArray);

          if($login) {
            $result = [
              'id'         => $user->id,
              'type'         => $user->type,
              'name'         => $user->name,
              'email'        => $user->email,
              'point'        => $user->profile->point,
              'access_token' => $this->apiToken,
            ];
            return response()->json(['status' => 'success','result' => $result]);            
            
          }
        } else {
          return response()->json(['status' => 'fail','result' => 'Invalid Password']);
        }
      } else {
        return response()->json(['status' => 'fail','result' => 'User not found']);
        
      }
    }
  }
  /**
   * Register
   */
  public function postRegister(Request $request)
  {
    // Validations
    $rules = [
      'name'     => 'required|min:3',
      'email'    => 'required|unique:users,email',
      'password' => 'required|min:8'
    ];
    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
      // Validation failed
      return response()->json(['status' => 'fail','result' => $validator->messages()]);
    } else {
      $postArray = [
        'name'      => $request->name,
        'email'     => $request->email,
        'type' => 2,
        'password'  => bcrypt($request->password),
        'api_token' => $this->apiToken
      ];

      $user = DB::table('users')->insertGetId($postArray);

      $profile = new Profile;
      $profile->user_id = $user;
      if(isset($request->telephone)) $profile->telephone = $request->telephone;
      if(isset($request->cvr_number)) $profile->cvr_number = $request->cvr_number;
      if(isset($request->address)) $profile->address = $request->address;
      if(isset($request->post_code)) $profile->post_code = $request->post_code;
      if(isset($request->city)) $profile->city = $request->city;
      if(isset($request->point)) $profile->point = $request->point;
      //if(isset($request->profile_picture)) $profile->profile_picture = $request->profile_picture;
      if(isset($request->profile_picture)) {
        $decoded_file = base64_decode($request->profile_picture['file_path']);
        $ext = pathinfo($request->profile_picture['file_name'], PATHINFO_EXTENSION);
        $path = public_path() . '/uploads/';
        $filename = time().'.'.$ext;
        file_put_contents($path . $filename, $decoded_file);

        // $file->move($path, $file_name);
        $profile->profile_picture = 'uploads/'.$filename;
      }

      if(isset($request->short_description)) $profile->short_description = $request->short_description;
      $profile->save();

      if($user) {
        $data = User::with('profile')->where('email',$request->email)->first();
        $result = [
          'id'         => $data->id,
          'type'         => $data->type,
          'name'         => $data->name,
          'email'        => $data->email,
          'point'        => $data->profile->point,
          'access_token' => $this->apiToken,
    ];
        return response()->json(['status' => 'success','result' => $result]);
        
      } else {
        return response()->json(['status' => 'fail','result' => 'Registration failed, please try again.']);
      }
    }
  }
  /**
   * Logout
   */
  public function postLogout(Request $request)
  {
    $token = $request->header('Authorization');
    $user = User::where('api_token',$token)->first();
    if($user) {
      $postArray = ['api_token' => null];
      $logout = User::where('id',$user->id)->update($postArray);
      if($logout) {
        return response()->json(['status' => 'success','result' => 'User Logged Out']);
      }
    } else {
      return response()->json(['status' => 'fail','result' => 'User Not Found']);
    }
  }
}
