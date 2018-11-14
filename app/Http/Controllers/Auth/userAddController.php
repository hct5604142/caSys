<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class userAddController extends Controller
{
    //
    public function create(Request $request){
        $id=$request->input('id');
        $name=$request->input('name');
        $password=$request->input('password');
    }
}
