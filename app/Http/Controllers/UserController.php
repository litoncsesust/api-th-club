<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\User;
use App\Profile;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $user;
    public function __construct(){
      $token = request()->header('Authorization');
      $this->user = User::where('api_token',$token)->first();
    }
    public function index()
    {
        if($this->user){
          $users = User::with('profile')->get();
          if($users){
              return response()->json(['status' => 'success','result' => $users]);
          }else{
              return response()->json(['status' => 'fail','result' => 'There is no users in the list'],401);
          }
        }else{
          return response()->json(['status' => 'fail','result' => 'You are not Authoriaze to see the user list page'],401);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      if($this->user){
        $user = User::with('profile')->where('id', $id)->first();
        return response()->json($user);
      }else{
        return response()->json(['status' => 'fail','result' => 'You are not Authoriaze to see the user list page'],401);
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      //print_r( $request->all() );
      //die('ok');
      if($this->user){
          $result = false;
          $array = [];
          if(isset($request->name)){
            $array['name'] = $request->name;
            $array['email'] = $request->email;
          }
          if( isset( $request->password ) ){
            $array['password'] = bcrypt($request->password);
          }
          if(!empty($array)){
            $inserted = User::where('id', $id)->update($array);
            if($inserted){
              $result = true;
            }
          }

          $profile = Profile::where('user_id',$id)->first();

          if($profile){

            $profile_array = [];
            if(isset($request->telephone)) $profile_array['telephone']= $request->telephone;
            if(isset($request->cvr_number)) $profile_array['cvr_number']= $request->cvr_number;
            if(isset($request->address)) $profile_array['address'] = $request->address;
            if(isset($request->post_code)) $profile_array['post_code'] = $request->post_code;
            if(isset($request->city)) $profile_array['city'] = $request->city;
            if(isset($request->point)) $profile_array['point'] = $request->point;
            if(isset($request->short_description)) $profile_array['short_description'] = $request->short_description;
            if(isset($request->profile_picture) && !empty($request->profile_picture)) {
              $decoded_file = base64_decode($request->profile_picture['file_path']);
              $ext = pathinfo($request->profile_picture['file_name'], PATHINFO_EXTENSION);
              $path = public_path() . '/uploads/';
              $filename = time().'.'.$ext;
              file_put_contents($path . $filename, $decoded_file);

              // $file->move($path, $file_name);
              $profile_array['profile_picture'] = 'uploads/'.$filename;
            }
            $inserted = Profile::where('user_id', $id)->update($profile_array);
            if($inserted){
              $result = true;
            }
          }


          if($result){
            return response()->json(['status' => 'success','result' => 'User Info updated successfully']);
          }else{
            return response()->json(['status' => 'fail','result' => 'You are not Authoriaze to see the user list page'],401);
          }

        }else{
          return response()->json(['status' => 'fail','result' => 'You are not Authoriaze to see the user list page'],401);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
