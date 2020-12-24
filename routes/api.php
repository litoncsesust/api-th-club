<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::prefix('v1')->namespace('API')->group(function () {
  // Login
  Route::post('/login','AuthController@postLogin');
  // Register
  Route::post('/register','AuthController@postRegister');
  // Protected with APIToken Middleware
  Route::middleware('APIToken')->group(function () {
    // Logout
  Route::post('/logout','AuthController@postLogout');

  //user
  Route::get('/users','UserController@index');

  });
});

Route::prefix('v1')->group(function () {
  //user
  Route::get('/users','UserController@index');
  Route::get('user/{id}','UserController@show');

  Route::post('user/{id}','UserController@update');
  
  //Product
  Route::get('/products', 'ProductController@index');
  Route::get('/products/user/{id}', 'ProductController@listing');
  Route::get('/product/{id}', 'ProductController@show');
  Route::post('/product', 'ProductController@store');
  Route::put('/product/{id}', 'ProductController@update');
  Route::delete('/product/{id}', 'ProductController@destroy');

  //File
  Route::delete('/file/{id}', 'FileController@destroy');
  Route::get('/files', 'FileController@index');
  
  //Club
  Route::get('/clubs', 'ClubController@index');
  Route::get('/club/{id}', 'ClubController@show');
  Route::post('/club', 'ClubController@store');
  Route::put('/club/{id}', 'ClubController@update');
  Route::delete('/club/{id}', 'ClubController@destroy');

  //Categories
  Route::get('/categories', 'CategoryController@index');
  //Route::get('/category/{id}', 'CategoryController@show');
  Route::post('/category', 'CategoryController@store');
  Route::put('/category/{id}', 'CategoryController@update');
  Route::delete('/category/{id}', 'CategoryController@destroy');

  //Sales
  // Route::get('/categories', 'CategoryController@index');
  // Route::get('/category/{id}', 'CategoryController@show');
  Route::post('/order', 'SaleController@store');
  Route::get('/myorders/{id}', 'SaleController@index');// pass user id
  // Route::put('/category/{id}', 'CategoryController@update');
  // Route::delete('/category/{id}', 'CategoryController@destroy');
  // Sales
  // 1) user_id
  // 2) product_id
  // 3) Club id
  // 4) Point
   // QUANTINTY
   //sku
  // 5) status (0)
  //deduct user point
  


});
