<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Helpers\Helper;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user() && Auth::user()->type){
            $user_type = Helper::name(Auth::user()->type);
        }        
        return view('welcome',['user_type' => $user_type]);
    }
}
