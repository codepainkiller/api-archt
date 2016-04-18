<?php

Route::get('/', function () {
    return view('auth/login');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/', 'Admin\IndexController@index')->name('admin.index');
    Route::resource('/user', 'Admin\UserController');
    Route::resource('/place', 'Admin\PlaceController');

});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
