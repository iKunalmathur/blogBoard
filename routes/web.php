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

Route::get('/blog','BlogController@index')->name('blog.index');
Route::get('/post/category/{category}','BlogController@category')->name('blogByCategory');
Route::get('/post/tag/{tag}','BlogController@tag')->name('blogByTag');
Route::get('/blogpost/{post}','BlogPostController@index')->name('blogpost.index');
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

    Route::get('/permission_category_create','PermissionController@create_category')->name('permission_category.create');
    Route::get('/permission_category_delete','PermissionController@delete_category')->name('permission_category.delete');
    Route::get('/permission_category_show','PermissionController@show_category')->name('permission_category.show');
});
