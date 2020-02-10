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
// route get
Route::get('/','pr@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('about','pr@about')->name('about');
Route::get('contactus','pr@contactus')->name('contactus');
// route post
Route::post('desend','pr@desend');
Route::post('comment/{id}','CommentController@comment');

//route  other
Route::resource('posts','post');
Route::resource('Tegs','TegsController')->only(['show']);

Auth::routes();
Route::get('user/verfiyed/{token}','Auth\RegisterController@verfiy');

