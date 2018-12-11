<?php

namespace App\Http\Controllers\Order;

use App\Http\Requests\Order\EproductRequest;
use App\Models\CarNoType;
use App\Models\StartendMailage;
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
        if($request->input('action')=='create'){
            $orderNumber=null;
            $carNo=null;
            $execDate=null;
            $start=null;
            $end=null;
            $boxesNo=null;
            $tonnage=null;
            $remark=null;
            foreach ($request->input('data') as $key =>$value){
                $orderNumber=$value['order_number'];
                $carNo=$value['car_no'];
                $execDate=$value['exec_date'];
                $start=$value['start'];
                $end=$value['end'];
                $boxesNo=$value['boxes_no'];
                $tonnage=$value['tonnage'];
                $remark=$value['remark'];
            }
            $carType=CarNoType::where('id',$carNo)->select('type')->first()->type;
            $carNo=CarNoType::where('id',$carNo)->select('no')->first()->no;
            $mileage=StartendMailage::where('start',$start)->where('end',$end)->first()->mileage;
            $item=new WaybillEproduct();
            $item->order_number=$orderNumber;
            $item->car_no=$carNo;
            $item->exec_date=$execDate;
            $item->start=$start;
            $item->end=$end;
            $item->boxes_no=$boxesNo;
            $item->tonnage=$tonnage;
            $item->remark=$remark;
            $item->car_type=$carType;
            $item->mileage=$mileage;
            if($item->save()){
                return array('data'=>[$item->toArray()]);
            }

        }

    }
    public function getCarNos(){
        return json_encode(CarNoType::select('id','no')->get()->toArray());
    }


}
