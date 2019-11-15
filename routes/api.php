<?php

use App\Http\Resources\UserCollection;
use App\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', 'AuthenticationController@login')->name('login');
Route::post('/register', 'AuthenticationController@register')->name('register');

Route::middleware('auth:api')->group(function () {
    
    Route::get('/users', function () {
        return UserCollection::collection(User::all());
    });

    Route::get('/logout', 'AuthenticationController@logout')->name('logout');
});
