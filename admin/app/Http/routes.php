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
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('auth.login');
});

Route::auth();

Route::group(['prefix' => 'dashboard'], function(){
    Route::get('/', 'DashboardController@index');
});

//app users
Route::group(['prefix'  =>  'app_user'], function(){
    Route::get('/', 'AppUserController@index');
    Route::get('/create', 'AppUserController@create');
    Route::post('/update/{id}', 'AppUserController@update');
    Route::get('/delete/{id}', 'AppUserController@destroy');
    Route::post('/store', 'AppUserController@store');
});


//users
Route::group(['prefix'  =>  'users'], function(){
    Route::get('/', 'UserController@index');
    Route::get('/create', 'UserController@create');
    Route::post('/update/{id}', 'UserController@update');
    Route::get('/delete/{id}', 'UserController@destroy');
    Route::post('/store', 'UserController@store');
});

//Course codes and materials route
Route::group(['prefix'  =>  'course'], function(){
    //course codes
    Route::group(['prefix'  =>  'code'], function() {
        Route::get('/', 'CourseCodeController@index');
        Route::get('/create', 'CourseCodeController@create');
        Route::post('/update/{id}', 'CourseCodeController@update');
        Route::get('/delete/{id}', 'CourseCodeController@destroy');
        Route::post('/store', 'CourseCodeController@store');
    });
    //course material
    Route::group(['prefix'  =>  'material'], function(){
        Route::get('/', 'CourseMaterialController@index');
        Route::get('/create', 'CourseMaterialController@create');
        Route::post('/update/{id}', 'CourseMaterialController@update');
        Route::get('/delete/{id}', 'CourseMaterialController@destroy');
        Route::post('/store', 'CourseMaterialController@store');
        Route::get('/show/{id}', 'CourseMaterialController@show');
    });
});

//pin
Route::group(['prefix'  =>  'pin'], function(){
    Route::get('/', 'PinController@index');
    Route::get('/create', 'PinController@create');
    Route::get('/delete', 'PinController@destroyAll');
    Route::get('/delete/{id}', 'PinController@destroy');
    Route::post('/store', 'PinController@store');
    Route::post('/send_pin/{id}', 'PinController@sendPin');
});