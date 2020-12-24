<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');
// Registration Routes...
Route::get('register', 'Auth\AuthController@showRegistrationForm');
Route::post('register', 'Auth\AuthController@register');
// Password Reset Routes...
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('admin', 'AdminController');
Route::resource('clubs', 'ClubBackendController');
Route::resource('customer', 'CustomerBackendController');
Route::resource('category', 'CategoryBackendController');
Route::resource('order', 'OrderBackendController');
Route::resource('product', 'ProductBackendController');
Route::resource('file', 'FileBackendController');

Route::get('/update', 'ProductController@index')->name('update');

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    Artisan::call('optimize');
    return "Cache is cleared";
});
