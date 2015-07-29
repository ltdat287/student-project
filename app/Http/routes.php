<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect('/student');
});

Route::get('student', 'StudentController@index');
Route::get('student/detail/{id}', 'StudentController@show');

// Use Authenticate for Create, Edit, Delete member
Route::group(['middleware' => 'auth'], function () {
	Route::get('student/create', 'StudentController@create');
	Route::post('student/create', 'StudentController@store');
	Route::get('student/edit/{id}', 'StudentController@edit');
	Route::put('student/edit_conf/{id}', 'StudentController@edit_conf');
	Route::put('student/edit/{id}', 'StudentController@update');
	Route::delete('student/delete/{id}', 'StudentController@destroy');
});

// Loging and logout controller
Route::get('/auth/login', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@postLogin');
Route::get('/auth/logout', 'Auth\AuthController@getLogout');
