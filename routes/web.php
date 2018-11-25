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

    Route::get('/auth/user_roles_manage', function (){
        return view('layers.auth.user_roles_manage');
    })->name('用户角色管理查看');
    Route::get('/auth/show_role_list', 'Auth\RoleUserManageController@showRolesList');
    Route::get('/auth/get_ajax_roles', 'Auth\RoleUserManageController@getAjaxRoles');
    Route::Post('/auth/edit_user_role', 'Auth\RoleUserManageController@editUserRole');

    Route::get('/auth/role_permissions_manage', function (){
        return view('layers.auth.role_permissions_manage');
    });
    Route::get('/auth/role_permissions_list', 'Auth\RolePermissionsManageController@showRolesList');
    Route::get('/auth/get_ajax_permissions', 'Auth\RolePermissionsManageController@getAjaxPermissions');
    Route::Post('/auth/edit_role_permission', 'Auth\RolePermissionsManageController@editRolePermission');
    Route::Post('/auth/add_role', 'Auth\RolePermissionsManageController@addRole');


});
