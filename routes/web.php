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

Route::get('logout' ,function (){
    Auth::logout();
    return redirect()->route('get.front.login');
} )->name('client-logout');

Route::group(['namespace'=>'App\Http\Controllers\Front','middleware'=>'auth:web'],function () {
    Route::get('booksDet', 'MainController@books')->name('books');
    Route::get('detailsBook/{id}', 'MainController@booksDetails')->name('details-books');
    Route::get('borrowRequest/{id}', 'MainController@borrow_request')->name('borrow-request');
    Route::post('pushBorrow', 'MainController@pushBorrow')->name('push-borrow-request');
    Route::get('borrowRequest', 'MainController@student_borrow_request')->name('student-borrow-request');
    Route::get('profile' , 'MainController@getProfile')->name('get.student.profile');
    Route::post('editProfile' , 'MainController@editProfile')->name('edit.student.profile');
    Route::get('getEditPass' , 'MainController@getEdtPass')->name('get.student.EditPass');
    Route::post('editPass' , 'MainController@editPass')->name('edit.student.Pass');
    Route::get('contact' , 'MainController@getContact')->name('contact.me');



});
Route::group(['namespace'=>'App\Http\Controllers\Front'],function (){
    Route::get('logins','LoginController@getClientLogin')->name('get.front.login');
    Route::post('logins','LoginController@Login')->name('front.login');
    Route::get('registers','RegisterController@getClientRegister')->name('get.front.register');
    Route::post('registers','RegisterController@Register')->name('front.register');
    Route::get('/home', 'MainController@home')->name('client-home');
    Route::get('about-us', 'MainController@about')->name('about.us');


});
/*Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/
