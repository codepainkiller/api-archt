<?php

Route::get('/', function () {
    return redirect()->route('admin.index');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/', 'Admin\IndexController@index')->name('admin.index');
    Route::resource('/user', 'Admin\UserController');
    Route::resource('/place', 'Admin\PlaceController');
    Route::resource('/category', 'Admin\CategoryController');

    Route::post('place/{id}/photos', 'Admin\PlaceController@addPhoto')->name('admin.place.photos');

});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
