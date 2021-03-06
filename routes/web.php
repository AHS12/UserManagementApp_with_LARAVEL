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

Route::get('/', 'WelcomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/forbidden', 'PagesController@index')->name('forbidden');
Route::post('updateUser-admin/{user}', 'AdminTaskController@makeAdmin');
Route::post('updateUser-user/{user}', 'AdminTaskController@makeUser');
Route::post('demote-user/{user}', 'AdminTaskController@DemoteToUser');
Route::patch('update-image/{user}', 'ImageController@updateUserImg');
Route::resource('emails', 'EmailController');

//social login
Route::get('/login/{social}', 'Auth\LoginController@socialLogin')
    ->where('social', 'twitter|facebook|linkedin|google|github|bitbucket');
Route::get('/login/{social}/callback', 'Auth\LoginController@handleProviderCallback')
    ->where('social', 'twitter|facebook|linkedin|google|github|bitbucket');
