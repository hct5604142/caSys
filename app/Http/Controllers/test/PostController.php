<?php

namespace App\Http\Controllers\test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class PostController extends Controller
{
    //
    public function createAjax(Request $request){
        $a=User::all()->toJson();
        return $a;
    }
}
