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


Route::get('/', 'MainController@index')->name('main.index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/fb', 'HomeController@index')->name('home.fb');
Route::get('profile', 'UserController@profile');
Route::post('profile', 'UserController@update_avatar');
Route::get('/admin', 'AdminController@index');
Route::get('/superadmin', 'SuperAdminController@index');
Route::resource('category', 'CategoryController');
Route::resource('textpost', 'TextpostController');
Route::resource('comment', 'CommentController');
Route::resource('picture', 'PictureController');
Route::resource('video', 'VideoController');
Route::resource('main', 'MainController');

Route::get('/picture/edit/{id}','PictureController@edit');
Route::post('/picture/update/{id}','PictureController@update');
//Route::get('/picture/destroy/{id}','PictureController@destroy');
Route::get('/picture/details/{id}', 'PictureController@show');
Route::get('/comment/edit/{id}','CommentController@edit');
Route::get('/comment/editpic/{id}','CommentController@editpic')->name('comment.editpic');
Route::get('/comment/editvid/{id}','CommentController@editvid')->name('comment.editvid');;