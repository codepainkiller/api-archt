<?php

Route::get('/', function () {
    return redirect()->route('admin.index');
});

// Admin routes...
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/', 'Admin\IndexController@index')->name('admin.index');
    Route::resource('/user', 'Admin\UserController');
    Route::resource('/place', 'Admin\PlaceController');
    Route::resource('/category', 'Admin\CategoryController');

    Route::post('place/{id}/photos', 'Admin\PlaceController@addPhoto')->name('admin.place.photos');

    Route::delete('photos/{id}', 'Admin\PhotosController@destroy');
});

// API routes...
Route::group(['prefix' => 'api/v1'], function () {

    Route::get('/', 'Api\IndexController@index');

    Route::get('users', 'Api\UserController@index');
    Route::get('users/{id}', 'Api\UserController@show');

    Route::get('places', 'Api\PlaceController@index');
    Route::get('places/{id}', 'Api\PlaceController@show');
    Route::get('places/{id}/photos', 'Api\PlaceController@photos');

    Route::get('photos', 'Api\PhotosController@index');

    Route::get('mixare/places', 'Api\MixareController@index');
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('helpers/str-random', function () {
    return str_random(10);
});
