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

Route::get('/ssss', function () {
    return view('welcome');
});
///////////////////////////////////////////Logout Admin ///////////////////////////////////////////
Route::get('logout' ,function (){
    Auth::guard('admin')->logout();
    return redirect()->route('get.admin.login');
} )->name('admin-logout');
/////////////////////////////////////////End logout//////////////////////////////////////////////

Route::group(['namespace'=>'App\Http\Controllers\Admin','middleware'=>'auth:admin','name'=>'.dashboard'],function () {
    Route::group(['prefix'=>'dashboard'],function () {
        Route::get('/', 'DashboardController@index')->name('dashboard.index');
        /////////////////////////////Start Category//////////////////////////////////////
        Route::resource('category', 'CategoryController')->except(['show']);
        /////////////////////////////End Category//////////////////////////////////////

        /////////////////////////////Start Book//////////////////////////////////////
        Route::resource('book', 'BookController')->except(['show']);
        Route::get('/founded/{ID}','BookController@changeStatus')->name('book.status');
        Route::get('studentBorrowBook/{id}', 'BookController@studentRequest')->name('student-borrow');

        /////////////////////////////End Book//////////////////////////////////////
        /////////////////////////////Start Student//////////////////////////////////////
         Route::resource('student', 'StudentController')->except(['show','create','edit','update','story']);
         Route::get('booksRequest/{id}', 'StudentController@bookRequest')->name('books-request');
        /////////////////////////////End Student//////////////////////////////////////
        /////////////////////////////Start Borrow Request/////////////////////////////////////
         Route::resource('borrowRequest', 'BorrowRequestController')->except(['show','create','edit','update','story']);
        Route::get('/accept/{ID}','BorrowRequestController@changeAccept')->name('borrow.accept');
        Route::get('/Roof/{ID}','BorrowRequestController@changeRoof')->name('roof.found');
        /////////////////////////////End BorrowRequest//////////////////////////////////////

        /// //////////////////////////// change pass//////////////////////////////////////
        Route::get('changePassword','ChangePassController@change')->name('admin.change');
        Route::post('changePassword','ChangePassController@updateChange')->name('admin.update.change');
        /// //////////////////////////// End Pass   /////////////////////////////////////

    });



});
Route::group(['namespace'=>'App\Http\Controllers\Admin\Auth','middleware'=>'guest:admin'],function (){
    Route::get('login','LoginController@getLogin')->name('get.admin.login');
    Route::post('login','LoginController@Login')->name('admin.login');

});
