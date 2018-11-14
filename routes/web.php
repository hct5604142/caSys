<?php

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



Route::get('/login', function () {
    return view('login');
});

Route::post('/login','LoginController@login');

//Route::post('/login','registorController@create');

Route::group(['middleware' => ['checklogin']], function() {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::post('/','registorController@create');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/logout','LogoutController');
    Route::get('/auth/add','Auth\UserAddController@show');

    Route::post('/auth/add','Auth\UserAddController@save');
 });
