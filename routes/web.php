<?php
use App\Http\Resources\UserCollection as UserResource;
use App\User;
use App\Post;


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

Route::get('posts', 'PostController@index');
Route::get('posts/{id}', 'PostController@show');
Route::post('posts', 'PostController@store');
Route::put('articles/{id}', 'PostController@update');
Route::delete('articles/{id}', 'PostController@delete');


Route::get('/user', function() {
    $users = User::all();
    $user = $users->find(5);
    return UserResource::collection(User::all());
});