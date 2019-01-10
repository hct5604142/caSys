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
    Route::Post('/formula/update_base_price', 'Formula\BasePriceController@updateBasePrice');
    Route::get('/formula/get_ajax_units', 'Formula\BasePriceController@getAjaxUnits');
    Route::Post('/formula/add_base_price', 'Formula\BasePriceController@addBasePrice');
    Route::Post('/formula/del_base_price', 'Formula\BasePriceController@delBasePrice');




    Route::get('/formula/unit_manage', function (){
        return view('layers.formula.unit_manage');
    });
    Route::get('/formula/show_units_list', 'Formula\UnitManageController@showUnitList');
    Route::Post('/formula/update_unit', 'Formula\UnitManageController@updateUnit');

    Route::get('/order/eproduct', function (){
        return view('layers.order.eproduct');
    });
    Route::get('/order/show_waybill_order_list/', 'Order\EProductController@showEProductOrder');
    Route::get('/order/show_waybill_order_list/{company}', 'Order\EProductController@showEProductOrder');
    Route::Post('/order/add_eproduct', 'Order\EProductController@AddEproductOrder');
    Route::get('/order/get_car_nos', 'Order\EProductController@getCarNos');

    Route::get('/order/car_no_type_manage', function (){
        return view('layers.order.car_no_type_manage');
    });
    Route::get('/order/show_no_type_list', 'Order\CarNoTypeController@showCarNoTypeList');
    Route::Post('/order/update_no_type', 'Order\CarNoTypeController@update');

    Route::get('/order/start_end_manage', function (){
        return view('layers.order.start_end_manage');
    });
    Route::get('/order/start_end_list', 'Order\StartEndController@showStartEndList');
    Route::Post('/order/update_start_end', 'Order\StartEndController@update');
    Route::Post('/order/state', 'Order\EproductController@updateState');

    Route::get('/order/eproduct_query', function (){
        return view('layers.order.eproduct_query');
    });
    Route::get('/order/show_waybill_order_query_list', 'Order\EProductQueryController@showEProductOrder');


    Route::get('/order/check_order_number', function (){
        return view('layers.order.check_order_number');
    });
    Route::get('/order/show_check_number_eproduct_order_list', 'Order\CheckOrderNumberController@showEProductOrder');
    Route::get('/order/show_check_number_eproduct_order_list/{company}', 'Order\CheckOrderNumberController@showEProductOrder');

});
