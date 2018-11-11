<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\Role;
use App\Models\Ua_uxr;
use App\Models\Permission;
use App\Models\Pa_pxr;


class registorController extends Controller
{
    //
    protected function create(Request $request){
        $user=new User();
        $user->id='302841';
        $user->password=Hash::make('123456');
        $user->name='hct';
        $user->save();
        //$role=new Role();
        //$role->name='超级管理员';
        //$role->save();
        //$ua=new Ua_uxr();
        //$ua->uid='302841';
        //$ua->rid=1;
        //$ua->save();
        //$permission=new Permission();
        //$permission->name='登陆';
        //$permission->fname='login';
        //$permission->save();
        //$pa_pxrs=new Pa_pxr();
        //$pa_pxrs->rid=1;
        //$pa_pxrs->pid=1;
        //$pa_pxrs->save();


    }
}
