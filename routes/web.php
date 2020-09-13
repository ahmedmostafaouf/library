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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix'=>'Post'],function () {
    Route::get('creat-post', 'App\Http\Controllers\Admin\PostController@creatPost')->name('get.create');
    Route::post('create', 'App\Http\Controllers\Admin\PostController@create')->name('create');
    Route::get('index', 'App\Http\Controllers\Admin\PostController@showAllPosts')->name('show');
    Route::get('home', 'App\Http\Controllers\Admin\PostController@home')->name('home');
    Route::get('contact', 'App\Http\Controllers\Admin\PostController@contact')->name('contact');
    Route::get('editPost/{id}', 'App\Http\Controllers\Admin\PostController@edit')->name('edit.post');
    Route::post('updatePost{id}', 'App\Http\Controllers\Admin\PostController@update')->name('update.post');
    Route::get('deletePost/{id}', 'App\Http\Controllers\Admin\PostController@delete')->name('delete.post');
    Route::get('showPost/{id}', 'App\Http\Controllers\Admin\PostController@showPost')->name('show.post');

});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
