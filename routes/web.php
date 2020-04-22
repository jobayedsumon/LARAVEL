<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::middleware('auth')->group(function() {
    Route::post('/tweets', 'TweetsController@store');
    Route::delete('/tweets/{tweet}', 'TweetsController@destroy');
    Route::get('/tweets', 'TweetsController@index')->name('home');
    Route::get('/explore', 'ExploreController@index');
});

Route::post('/tweets/{tweet}/like', 'TweetsLikeController@store');
Route::delete('/tweets/{tweet}/like', 'TweetsLikeController@destroy');

Route::get('profiles/{user:username}', 'ProfilesController@show')->name('profile');
Route::patch('profiles/{user:username}', 'ProfilesController@update')->middleware('can:edit,user');
Route::get('profiles/{user:username}/edit', 'ProfilesController@edit')->middleware('can:edit,user');

Route::post('profiles/{user:username}/follow', 'FollowsController@store')->name('follow');


