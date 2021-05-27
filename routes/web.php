<?php

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

Route::get('/', 'BlogController@index')->name('guest.index');
Route::get('guest/{slug}', 'BlogController@show')->name('guest.show');

Route::post('guest/{post}/add-comment', 'BlogController@addComment')->name('guest.add-comment');

Route::resource('posts', 'PostController');