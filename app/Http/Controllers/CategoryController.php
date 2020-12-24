<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Validator;
use App\User;

class CategoryController extends Controller
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
     $categories = Category::All();
      if($categories){
          return response()->json(['status' => 'success','result' => $categories]);
      }else{
          return response()->json(['status' => 'fail','result' => 'There is no category in the list'],401);
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
            ];
              $validator = Validator::make($request->all(), $rules);
              if ($validator->fails()) {
                // Validation failed
                return response()->json(['status' => 'fail','result' => $validator->messages()]);
              }
            $data = $request->all();
            $category = Category::insert($data);
            if($category){
                return response()->json(['status' => 'success','result' => $category]);
            }
        }
        else{
                return response()->json(['status' => 'fail','result' => 'The category could not be saved. Please, try again.'],401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        if($this->user){
            $category = Category::find($id);
            if($category->fill($request->all())->save()){
                return response()->json(['status' => 'success','result' => 'The category has successfully been updated']);
            }
        }
        else{
                return response()->json(['status' => 'fail','result' => 'You are not Authorize to see the user list page'],401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($this->user){
            if(Category::destroy($id)){
                return response()->json(['status' => 'success','result' => 'The category successfully Deleted']);
            }
        }
        else{
                return response()->json(['status' => 'fail','result' => 'You are not Authorize to see the user list page'],401);
        }
    }
}
