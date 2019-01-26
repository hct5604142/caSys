<?php

namespace App\Http\Controllers\Order;

use App\Models\WaybillEproduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderApprovalController extends Controller
{
    //
    public function showEProductOrder(Request $request){
        $company=$this->getCompanyName($request->company);
        $date=$request->date;
        return array('data'=>WaybillEProduct::where('check_add',1)
            ->where('check_number',1)
            ->where('check_price',1)
            ->where('leader_approval',0)
            ->where('company',$company)
            ->where('exec_date','like',$date.'%')
            ->get()->toArray());
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
