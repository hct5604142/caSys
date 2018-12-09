<?php

namespace App\Http\Controllers\Order;

use App\Http\Requests\Order\EproductRequest;
use App\Models\CarNoType;
use App\Models\WaybillEproduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EProductController extends Controller
{
    //
    public function showEProductOrder(){
        return array('data'=>WaybillEProduct::all()->toArray());
    }

    public function AddEproductOrder(EproductRequest $request){

    }
    public function getCarNos(){
        return json_encode(CarNoType::select('id','no')->get()->toArray());
    }
}
