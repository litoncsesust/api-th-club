<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;
use App\User;
use App\Profile;
use Validator;
use View;

class AdminController extends Controller
{
    private $apiToken;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        // Unique Token
        $this->apiToken = uniqid(base64_encode(str_random(60)));
        $this->middleware('auth');
    }
    public function index()
    {
        //$users = User::with('profile')->where('type',3)->get();
        $users = User::with('profile')->paginate(10);
        //dd($admin_users);
        $user_type = Helper::setUserType();
        return view('content.admin.index', ['users' => $users, 'user_type' => $user_type]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validations
        $rules = [
          'name'     => 'required|min:3',
          'email'    => 'required|unique:users,email',
          'password' => 'required|min:8'
        ];
        //$validator = Validator::make($request->all(), $rules);
        $request->validate($rules);
        $data = $request->all();
        $user_data = [];
        $profile_data = [];
        $user_data['name'] = $request->name;
        $user_data['email'] = $request->email;
        $user_data['password'] = bcrypt($request->password);
        $user_data['api_token'] = $this->apiToken;
        $user_data['type'] = 2;

        $fileNameToStore = '';

        $user = DB::table('users')->insertGetId($user_data);
        if($request->hasFile('profile_picture')) {
            $filenameWithExt = $request->file('profile_picture')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
            $extension = $request->file('profile_picture')->getClientOriginalExtension();
            $fileNameToStore = time().'.'.$extension;              
            $destinationPath = 'uploads';
            $request->file('profile_picture')->move($destinationPath,$fileNameToStore);
            $fileNameToStore = 'uploads/'.$fileNameToStore;
            
        }
        if($user){
            Profile::insert([
                'user_id' => $user,
                'telephone' => $request->telephone,
                'cvr_number' => $request->cvr_number,
                'address' => $request->address,
                'post_code' => $request->post_code,
                'city' => $request->city,
                'point' => $request->point,
                'point_expire_date' => $request->point_expire_date.' 00:00:00',
                'short_description' => $request->short_description,
                'profile_picture' => $fileNameToStore
            ]);
        }
        
        return redirect()->route('admin.index')->with('Admin User added successfully');

    }

    /**
     * Display the total used point by user.
     *
     * @return \Illuminate\Http\Response
     */
    public static function getTotalUsedPoint()
    {
        $total_point = DB::table('profiles')
            ->sum('point');
        return $total_point;
    }

    /**
     * Display the total user count.
     *
     * @return \Illuminate\Http\Response
     */
    public static function totalUser()
    {
        $user = User::all();
        $total = $user->count();
        return $total;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function showuser($id)
    {
        $user = User::with('profile')->where('id', $id)->first();
        $profile_picture = $user->profile['profile_picture'];



        return $profile_picture;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with('profile')->findOrFail($id);
        $user_type = Helper::setUserType();
        return view('content.admin.profile', ['user' => $user, 'user_type' => $user_type]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with('profile')->where('id', $id)->first();
        $user_type = Helper::setUserType();
        return view('content.admin.edit', ['user' => $user, 'user_type' => $user_type]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|max:255',
            'type' => 'required',
        ]);

        $data = $request->all();

        unset($data['_method']);
        unset($data['_token']);
        unset($data['point']);
        unset($data['point_expire_date']);
        unset($data['add_point']);
        unset($data['cvr_number']);
        unset($data['telephone']);
        unset($data['address']);
        unset($data['post_code']);
        unset($data['city']);
        unset($data['short_description']);

        if(isset($request->reset_password) && !empty($request->reset_password)){
            $request->validate([
                'reset_password' => 'min:8',
            ]);
            $uesr_data['password'] = bcrypt($request->reset_password);
        }
        $uesr_data['type'] = $request->type;
        $uesr_data['name'] = $request->name;
        $uesr_data['email'] = $request->email;

        $update = User::where('id', $id)->update($uesr_data);
        $profile = Profile::where('user_id',$id)->first();
        $profile_array = [];
        if($profile){
            $profile_array['telephone'] = $request->telephone;
            $profile_array['cvr_number'] = $request->cvr_number;
            $profile_array['address'] = $request->address;
            $profile_array['post_code'] = $request->post_code;
            $profile_array['city'] = $request->city;
            $profile_array['short_description'] = $request->short_description;
            $profile_array['point'] = $profile->point + $request->add_point;
            $profile_array['point_expire_date'] = $request->point_expire_date.' 00:00:00';
            $inserted = Profile::where('user_id', $id)->update($profile_array);
        }
        if($update)
        {
            return redirect()->route('admin.index')->with('User updated successfully');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id)->delete();
        return redirect()->route('admin.index')->with('User deleted successfully');

    }
}
