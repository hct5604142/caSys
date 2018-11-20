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


Route::get('/test/1', function () {
    return view('test.post');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', 'LoginController@login');

//Route::post('/login','registorController@create');

Route::group(['middleware' => ['checklogin']], function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::post('/', 'registorController@create');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/logout', 'LogoutController');
    Route::get('/auth/add', 'Auth\UserAddController@show');

    Route::post('/auth/add', 'Auth\UserAddController@save');
    Route::get('/auth/user_manage', 'Auth\UserManageController@show');

    Route::get('/auth/show_list', 'Auth\UserManageController@showUserList');
    Route::post('/auth/update_name', 'Auth\UserManageController@updateName');
});
