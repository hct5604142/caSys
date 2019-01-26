<?php

namespace App\Http\Controllers\Order;

use App\Models\WaybillEproduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckOrderPriceController extends Controller
{
    //
    public function showEProductOrder(Request $request){
        $company=$this->getCompanyName($request->company);
        return array('data'=>WaybillEProduct::where('check_add',1)->where('check_number',1)->where('check_price',0)->where('company',$company)->get()->toArray());
    }

    public function editEproductOrder(Request $request){
        if($request->input('action')=='remove'){
            $id=null;
            foreach ($request->input('data') as $key=>$value){
                $id=$value['id'];
            }
            $wayBill=WaybillEproduct::find($id);
            $wayBill->check_price=1;
            $wayBill->save();
            return array('data'=>[]);
        }elseif($request->input('action')=='edit'){
            $wayBills=WaybillEproduct::where('check_add',1)->where('check_number',1)->where('check_price',0)->get();
            foreach ($wayBills as $value){
                $value->check_price=1;
                $value->save();
            }
            return array('data'=>[]);
        }
    }

    protected function getCompanyName($id){
        if($id ==1){
            return '鑫发货运有限公司';
        }
        if($id ==2){
            return '顺达运输有限公司';
        }
        if($id ==3){
            return '安文运输有限公司';
        }
    }
}
