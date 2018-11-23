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
Route::get('/no_right', function () {
    return view('no-permission');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', 'LoginController@login');
Route::get('/', function () {
    return view('welcome');
});

//Route::post('/login','registorController@create');

Route::group(['middleware' => ['checklogin','authorize']], function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::post('/', 'registorController@create');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('仪表盘查看');
    Route::get('/logout', 'LogoutController');
    Route::get('/auth/add', 'Auth\UserAddController@show');

    Route::post('/auth/add', 'Auth\UserAddController@save');
    Route::get('/auth/user_manage', 'Auth\UserManageController@show')->name('用户查看');

    Route::get('/auth/show_user_list', 'Auth\UserManageController@showUserList')->name('用户查看');
    Route::post('/auth/update_name', 'Auth\UserManageController@updateName');

    Route::post('/auth/del', 'Auth\UserManageController@delUser');
    Route::post('/auth/edit_pass', 'Auth\UserManageController@editUserPass');
    Route::post('/auth/edit_state', 'Auth\UserManageController@editUserState');

    Route::get('/auth/roles_manage', function (){
        return view('layers.auth.roles_manage');
    })->name('角色管理查看');

    Route::get('/auth/show_permission_list', 'Auth\PermissionManageController@showRolesList');


});
