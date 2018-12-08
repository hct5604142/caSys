<?php

namespace App\Http\Controllers\Order;

use App\Models\WaybillEproduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EProductController extends Controller
{
    //
    public function showEProductOrder(){
        return array('data'=>WaybillEProduct::all()->toArray());
    }

}
