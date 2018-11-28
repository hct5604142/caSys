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

    Route::post('/auth/add', 'Auth\RoleUserManageController@userAdd');
    Route::get('/auth/user_manage', 'Auth\UserManageController@show')->name('用户查看');

    Route::get('/auth/show_user_list', 'Auth\UserManageController@showUserList')->name('用户查看');
    Route::post('/auth/update_name', 'Auth\RoleUserManageController@updateName');

    Route::post('/auth/del', 'Auth\RoleUserManageController@userDel');
    Route::post('/auth/edit_pass', 'Auth\RoleUserManageController@editUserPass');
    Route::post('/auth/edit_state', 'Auth\RoleUserManageController@editUserState');

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
    Route::Post('/auth/remove_role', 'Auth\RolePermissionsManageController@removeRole');
    Route::Post('/auth/edit_role_name', 'Auth\RolePermissionsManageController@editRoleName');



    Route::get('/auth/permissions_manage', function (){
        return view('layers.auth.permission_manage');
    });
    Route::get('/auth/permissions_list', 'Auth\PermissionsManageController@showPermissionsList');

    Route::get('/formula/oil_price_chgs', function (){
        return view('layers.formula.oil_price_chgs');
    });
    Route::get('/formula/show_chgs_list', 'Formula\OilPriceChgsController@showChgsList');
    Route::Post('/formula/update', 'Formula\OilPriceChgsController@lspUpdate');
    Route::Get('/formula/get_args', 'Formula\OilPriceChgsController@getArgs');

    Route::get('/formula/base_price', function (){
        return view('layers.formula.base_price');
    });
    Route::get('/formula/show_base_price_list', 'Formula\BasePriceController@showBasePriceList');




});
