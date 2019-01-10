<?php

namespace App\Http\Controllers\Order;

use App\Models\WaybillEproduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckOrderNumberController extends Controller
{
    //
    public function showEProductOrder(Request $request){
        if($request->company ==1){
            $company='鑫发货运有限公司';
            return array('data'=>WaybillEProduct::where('check_add',1)->where('company',$company)->get()->toArray());
        }
        if($request->company ==2){
            $company='顺达运输有限公司';
            return array('data'=>WaybillEProduct::where('check_add',1)->where('company',$company)->get()->toArray());
        }
        if($request->company ==3){
            $company='安文运输有限公司';
            return array('data'=>WaybillEProduct::where('check_add',1)->where('company',$company)->get()->toArray());
        }

    }
}
