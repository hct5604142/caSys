<?php

namespace App\Http\Controllers\Auth;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionsManageController extends Controller
{
    //
    public function showPermissionsList(){
        $permissions=Permission::all();
        return array('data'=>$permissions->toArray());
    }
}
