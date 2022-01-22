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
    return view('login');
});


Route::prefix('members')->group(function () {
    Route::post('login', 'AuthController@login');

    Route::middleware('auth:web')->group(function () {
        Route::get('','MemberController@index')->name('member.dashboard');
        Route::get('loan','MemberController@loan')->name('member.loan');
    });
});


Route::prefix('admin')->group(function(){
    Route::get('login',function(){
        return view('admin.login');
    });
    Route::post('login', 'AuthController@admin');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/','AdminController@index')->name('admin.dashboard');
        Route::get('books','AdminController@books')->name('admin.books');
        Route::get('books/add','AdminController@booksAdd')->name('admin.books.add');
        Route::get('members','AdminController@members')->name('admin.members');
    });
});
