<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
    return view('auth.login');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@search')->name('search');

Route::get('/profile', 'Usercontroller@index')->name('profile');
Route::post('/profile', 'Usercontroller@update')->name('profile');

Route::get('/newpost', 'PostController@create')->name('newpost');
Route::post('/post/create', 'PostController@store')->name('post.create');
Route::get('/mypost', 'PostController@mypost')->name('mypost');
Route::get('/post/edit/{id}', 'PostController@edit')->name('post.edit');
Route::put('/post/update/{id}', 'PostController@update')->name('post.update');
Route::get('/post/delete/{id}', 'PostController@destroy')->name('post.delete');
Route::get('/post/{id}', 'PostController@getOnePost')->name('post');

Route::post('/comment/new','CommentController@store')->name('newcomment');
Route::get('/comment/delete/{id}', 'CommentController@destroy')->name('comment.delete');
;
