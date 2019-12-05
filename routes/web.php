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

Route::post('/post/send', 'PostController@create')->name('post.create');
Route::get('/post/delete/{id}', 'PostController@destroy')->name('post.delete');

Route::get('/settings', 'ProfileController@settings')->name('profile.settings');
Route::put('/settings/update/{id}', 'ProfileController@update')->name('profile.update');
Route::get('/deactive/{id}', 'ProfileController@deactive')->name('profile.deactive');
Route::get('/{username}', 'ProfileController@index')->name('profile.show');
