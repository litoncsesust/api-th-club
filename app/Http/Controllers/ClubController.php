<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Club;
use Illuminate\Http\Request;
use App\User;
use Validator;

class ClubController extends Controller
{

    private $user;
    public function __construct(){
      $token = request()->header('Authorization');
      $this->user = User::where('api_token',$token)->first();
    }     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $club = Club::All();

        if($club){
            return response()->json(['status' => 'success','result' => $club]);
        }else{
            return response()->json(['status' => 'fail','result' => 'There is no Drivers in the list'],401);
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
        if($this->user){
            $rules = [
                'name' => 'required',
                'post_code' => 'required',
                'city' => 'required',
                'email' => 'required',
                'telephone' => 'required',
                'mobile' => 'required',
                'address' => 'required',
                'short_description' => 'required',
            ];
              $validator = Validator::make($request->all(), $rules);
              if ($validator->fails()) {
                // Validation failed
                return response()->json(['status' => 'fail','result' => $validator->messages()]);
              } 
            $club = Club::insert($request->all());
            if($club){
                return response()->json(['status' => 'success','result' => $club]);
            }              
        }
        else{
                return response()->json(['status' => 'fail','result' => 'You are not Authoriaze to see the user list page'],401);   
        }        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($this->user){
            $club = Club::where('id', $id)->first();
            return response()->json(['status' => 'success','result' => $club]);
          }else{
            return response()->json(['status' => 'fail','result' => 'You are not Authoriaze to see the user list page'],401);
          }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Club  $club
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
     * @param  \App\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($this->user){
            $club = Club::find($id);
            if($club->fill($request->all())->save()){
                return response()->json(['status' => 'success','result' => 'Club successfully updated']);
            }
        }    
        else{
                return response()->json(['status' => 'fail','result' => 'You are not Authoriaze to see the user list page'],401);   
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Club::destroy($id)){
            return response()->json(['status' => 'success','result' => 'User successfully Deleted']);
        }
    }
}
