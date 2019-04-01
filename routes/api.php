<?php

use Illuminate\Http\Request;

Route::prefix('auth')->group(function (){
    Route::post('register', 'API\AuthController@register');

    Route::middleware('api')->group(function () {
        Route::post('login', 'API\AuthController@login')->name('login');
        Route::post('logout', 'API\AuthController@logout');
        Route::post('refresh', 'API\AuthController@refresh');
        Route::post('me', 'API\AuthController@me');
    });
});

Route::prefix('advertisement')->group(function () {
    Route::post('{user}/store', 'API\PropertyController@store');
    Route::post('{property}/upload-image', 'API\PropertyController@UploadAdvertImage');
    Route::post('{property}/payment', 'API\PropertyController@ProcessAdvertPayment');
});

Route::get('home', function() {return 'home';})->name('home');
