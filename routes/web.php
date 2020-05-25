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
  return redirect()->route("login");
    // return view('welcome');
});

Auth::routes();
// Route::group(['namespace'=> 'Admin','middleware'=>'auth:admin'],function(){
Route::group(['middleware'=>'auth:web'],function(){
    //Admin Home-Routes
    Route::get('/home','HomeController@index')->name('home');
    //user routes
    Route::resource('/user','UserController');
    //role routes
    Route::resource('/role','RoleController');
    //permissions routes
    Route::resource('/permission','PermissionController');
    //Post Routes
    Route::resource('/post','PostController');
    //Tag Routes
    Route::resource('/tag','TagController');
    //Category Routes
    Route::resource('/category','CategoryController');
});
