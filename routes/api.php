<?php

use Illuminate\Http\Request;


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::prefix('auth')->group(function () {
//     Route::post('register', 'API\AuthController@register');
//     Route::post('login', 'API\AuthController@authenticate');
// });

// Route::prefix('advertisement')->group(function () {
//     Route::post('store', 'API\PropertyController@store');
//     Route::post('{property}/upload-image', 'API\PropertyController@UploadAdvertImage');
//     Route::post('{property}/payment', 'API\PropertyController@ProcessAdvertPayment');
// });

// Route::get('/properties', function() {
//     $properties = App\Property::all();
//     return response()->json($properties);
// });

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'API\AuthController@login');
    Route::post('logout', 'API\AuthController@logout');
    Route::post('refresh', 'API\AuthController@refresh');
    Route::post('me', 'API\AuthController@me');

});