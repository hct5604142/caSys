<?php

namespace App\Http\Controllers\Order;

use App\Http\Requests\Order\EproductRequest;
use App\Models\BasePrice;
use App\Models\CarNoType;
use App\Models\OilPriceChg;
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
            $transportCategory=null;
            foreach ($request->input('data') as $key =>$value){
                $orderNumber=$value['order_number'];

                $carNo=$value['car_no'];
                $execDate=$value['exec_date'];
                $start=$value['start'];
                $end=$value['end'];
                $boxesNo=$value['boxes_no'];
                $tonnage=$value['tonnage'];
                $remark=$value['remark'];
                $transportCategory=$value['transport_category'];
            }
            $carType=CarNoType::where('id',$carNo)->select('type')->first()->type;
            $carNo=CarNoType::where('id',$carNo)->select('no')->first()->no;
            $mileage=StartendMailage::where('start',$start)->where('end',$end)->first()->mileage;
            $item=new WaybillEproduct();
            $item->order_number=$orderNumber;
            $item->transport_category=$transportCategory;
            $item->car_no=$carNo;
            $item->exec_date=$execDate;
            $item->start=$start;
            $item->end=$end;
            $item->boxes_no=$boxesNo;
            $item->tonnage=$tonnage;
            $item->remark=$remark;
            $item->car_type=$carType;
            $item->mileage=$mileage;
            $item->unit_price=($this->calUnitPrice($transportCategory,$mileage,$tonnage,$carNo))[0];
            $item->freight=($this->calUnitPrice($transportCategory,$mileage,$tonnage,$carNo))[1];
            if($item->save()){
                return array('data'=>[$item->toArray()]);
            }

        }

    }
    public function getCarNos(){
        return json_encode(CarNoType::select('id','no')->get()->toArray());
    }


    protected function calUnitPrice($transportCategory,$mileage,$tonnage,$carNo){
        $oilPriceChg=OilPriceChg::first();
        $arr=[];
        //是否为烟草公司
        if($transportCategory==1){
            $price=round(BasePrice::find(15)->base_price*round((1-(round(($oilPriceChg->ip-$oilPriceChg->lsp)/$oilPriceChg->ip,4))*0.3),4),2);
            array_push($arr,$price);
            array_push($arr,round($price*$mileage*$tonnage,2));
            return  $arr;
        }else{
            //小于15吨
            if($tonnage<=15){
                if($mileage<=300){
                    $price=round(BasePrice::find(5)->base_price*round((1-(round(($oilPriceChg->ip-$oilPriceChg->lsp)/$oilPriceChg->ip,4))*0.3),4),2);
                    array_push($arr,$price);
                    array_push($arr,round($price*$mileage*$tonnage,2));
                    return  $arr;
                }else if($mileage>300&&$mileage<=2500){
                    $price=round(BasePrice::find(6)->base_price*round((1-(round(($oilPriceChg->ip-$oilPriceChg->lsp)/$oilPriceChg->ip,4))*0.3),4),2);
                    array_push($arr,$price);
                    array_push($arr,round($price*$mileage*$tonnage,2));
                    return  $arr;
                }else{
                    $price=round(BasePrice::find(7)->base_price*round((1-(round(($oilPriceChg->ip-$oilPriceChg->lsp)/$oilPriceChg->ip,4))*0.3),4),2);
                    array_push($arr,$price);
                    array_push($arr,round($price*$mileage*$tonnage,2));
                    return  $arr;
                }
            }else{

            }
        }

    }


}
