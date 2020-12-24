<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use App\User;

class FileController extends Controller
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
        //

        exit("In");
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
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */

    public function destroy($file_name_id)
    {
        if($this->user){           
            $file_path = 'product-'.$file_name_id;
            $file = File::where('file_path', 'LIKE', '%'.$file_path.'%')->first();
            $id = $file->id;
            if(File::destroy($id)){
                if (file_exists($file->file_path)) {
                    unlink(base_path().'/public/'.$file->file_path);
                }
                return response()->json(['status' => 'success','result' => 'The File successfully Deleted']);
            }
        }
        else{
            return response()->json(['status' => 'fail','result' => 'You are not Authorize to see the user list page'],401);   
        }  
        
    }
}
