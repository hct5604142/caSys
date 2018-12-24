<?php

namespace App\Http\Controllers\Order;

use App\Models\WaybillEproduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EProductQueryController extends Controller
{
    //
    public function showEProductOrder(Request $request){
        return array('data'=>WaybillEproduct::all()->toArray());
    }
}
