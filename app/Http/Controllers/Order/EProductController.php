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
use Illuminate\Routing\Route;

class EProductController extends Controller
{
    //
    public function showEProductOrder(Request $request){
        if($request->company ==1){
            $company='鑫发货运有限公司';
            return array('data'=>WaybillEProduct::where('check_add',0)->where('company',$company)->get()->toArray());
        }
        if($request->company ==2){
            $company='顺达运输有限公司';
            return array('data'=>WaybillEProduct::where('check_add',0)->where('company',$company)->get()->toArray());
        }
        if($request->company ==3){
            $company='安文运输有限公司';
            return array('data'=>WaybillEProduct::where('check_add',0)->where('company',$company)->get()->toArray());
        }

    }

    public function AddEproductOrder(EproductRequest $request){
        $company=null;
        if($request->company ==1){
            $company='鑫发货运有限公司';
        }
        if($request->company ==2){
            $company='顺达运输有限公司';
        }
        if($request->company ==3){
            $company='安文运输有限公司';
        }

        if($request->input('action')!='remove'){
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
            if(CarNoType::where('no',$carNo)->first()->type<=15&&$tonnage>15){
                $item=new WaybillEproduct();
                $item2=new WaybillEproduct();
                $item->order_number=$orderNumber;
                //是否是烟草公司
                $item->transport_category=$transportCategory;
                $item->car_no=$carNo;
                $item->exec_date=$execDate;
                $item->start=$start;
                $item->end=$end;
                $item->boxes_no=$boxesNo;
                $item->tonnage=15;
                $item->remark=$remark;
                $item->car_type=$carType;
                $item->mileage=$mileage;
                $item->unit_price=($this->calUnitPrice($transportCategory,$mileage,15,$carNo))[0];
                $item->freight=($this->calUnitPrice($transportCategory,$mileage,15,$carNo))[1];
                $item->company=$company;
                $item->save();


                $item2->order_number=$orderNumber;
                //是否是烟草公司
                $item2->transport_category=$transportCategory;
                $item2->car_no=$carNo;
                $item2->exec_date=$execDate;
                $item2->start=$start;
                $item2->end=$end;
                $item2->boxes_no=$boxesNo-90;
                $item2->tonnage=$tonnage-15;
                $item2->car_type=$carType;
                $item2->mileage=$mileage;
                $item2->unit_price=($this->calUnitPrice($transportCategory,$mileage,$tonnage,$carNo,1))[0];
                $item2->freight=($this->calUnitPrice($transportCategory,$mileage,$tonnage,$carNo,1))[1];
                $item2->company=$company;
                $item2->save();
                return array('data'=>WaybillEproduct::where('order_number',$orderNumber)->get()->toArray());
            }else{
                $item=null;
                if($request->input('action')=='edit'){
                    $id=null;
                    foreach ($request->input('data') as $key => $value){
                        $id=$key;
                    }
                    $item=WaybillEproduct::find($id);
                }elseif($request->input('action')=='create'){
                    $item=new WaybillEproduct();
                }
                $item->order_number=$orderNumber;
                //是否是烟草公司
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
                $item->company=$company;
                if($item->save()){
                    if($request->input('action')=='edit'){
                        return array('data'=>[WaybillEproduct::find($item->id)->toArray()]);
                    }
                    return array('data'=>WaybillEproduct::where('order_number',$orderNumber)->get()->toArray());
                }
            }
        }else{
            $id=null;
            foreach ($request->input('data') as $key => $value){
                $id=$key;
            }
            if(WaybillEproduct::find($id)->delete()){
                return array('data'=>[]);
            }
        }
    }
    public function getCarNos(){
        return json_encode(CarNoType::select('id','no')->get()->toArray());
    }


    protected function calUnitPrice($transportCategory,$mileage,$tonnage,$carNo,$tonnageExcept=0){
        $oilPriceChg=OilPriceChg::first();
        $arr=[];
        //是否为烟草公司
        if($transportCategory==1){
            $price=round(BasePrice::find(15)->base_price*round((1-(round(($oilPriceChg->ip-$oilPriceChg->lsp)/$oilPriceChg->ip,4))*0.3),4),2,PHP_ROUND_HALF_UP);
            array_push($arr,$price);
            array_push($arr,round($price*$mileage*$tonnage,3,PHP_ROUND_HALF_UP));
            return  $arr;
        }else{
            //小于15吨
            if($tonnage<=15){
                if($mileage<=300){
                    $price=round(BasePrice::find(5)->base_price*round((1-(round(($oilPriceChg->ip-$oilPriceChg->lsp)/$oilPriceChg->ip,4))*0.3),4),2,PHP_ROUND_HALF_UP);
                    array_push($arr,$price);
                    array_push($arr,round($price*$mileage*$tonnage,3,PHP_ROUND_HALF_UP));
                    return  $arr;
                }else if($mileage>300&&$mileage<=2500){
                    $price=round(BasePrice::find(6)->base_price*round((1-(round(($oilPriceChg->ip-$oilPriceChg->lsp)/$oilPriceChg->ip,4))*0.3),4),2,PHP_ROUND_HALF_UP);
                    array_push($arr,$price);
                    array_push($arr,round($price*$mileage*$tonnage,3,PHP_ROUND_HALF_UP));
                    return  $arr;
                }else if($mileage>2500){
                    $price=round(BasePrice::find(7)->base_price*round((1-(round(($oilPriceChg->ip-$oilPriceChg->lsp)/$oilPriceChg->ip,4))*0.3),4),2,PHP_ROUND_HALF_UP);
                    array_push($arr,$price);
                    array_push($arr,round($price*$mileage*$tonnage,3,PHP_ROUND_HALF_UP));
                    return  $arr;
                }
            }else{//大于15吨
                //是否使用的是15以下车型
                if($tonnageExcept==1) {
                    $tonnage = $tonnage - 15;
                }
                    if($mileage<=300){
                        $price=round(BasePrice::find(1)->base_price*round((1-(round(($oilPriceChg->ip-$oilPriceChg->lsp)/$oilPriceChg->ip,4))*0.3),4),2,PHP_ROUND_HALF_UP);
                        array_push($arr,$price);
                        array_push($arr,round($price*$mileage*$tonnage,3,PHP_ROUND_HALF_UP));
                        return  $arr;
                    }else if($mileage>300&&$mileage<=1000){
                        $price=round(BasePrice::find(2)->base_price*round((1-(round(($oilPriceChg->ip-$oilPriceChg->lsp)/$oilPriceChg->ip,4))*0.3),4),2,PHP_ROUND_HALF_UP);
                        array_push($arr,$price);
                        array_push($arr,round($price*$mileage*$tonnage,3,PHP_ROUND_HALF_UP));
                        return  $arr;
                    }else if($mileage>1000&&$mileage<=2500){
                        $price=round(BasePrice::find(3)->base_price*round((1-(round(($oilPriceChg->ip-$oilPriceChg->lsp)/$oilPriceChg->ip,4))*0.3),4),2,PHP_ROUND_HALF_UP);
                        array_push($arr,$price);
                        array_push($arr,round($price*$mileage*$tonnage,3,PHP_ROUND_HALF_UP));
                        return  $arr;
                    }else if($mileage>2500){
                        $price=round(BasePrice::find(4)->base_price*round((1-(round(($oilPriceChg->ip-$oilPriceChg->lsp)/$oilPriceChg->ip,4))*0.3),4),2,PHP_ROUND_HALF_UP);
                        array_push($arr,$price);
                        array_push($arr,round($price*$mileage*$tonnage,3,PHP_ROUND_HALF_UP));
                        return  $arr;
                    }
            }
        }

    }

    public function updateState(Request $request){
        if($request->input('action')=='edit'){
            $items=WaybillEproduct::all();
            foreach ($items as $item){
                $item->check_add=1;
                $item->save();
            }
            return array('data'=>[]);
        }elseif ($request->input('action')=='remove'){
            $id=null;
            foreach ($request->input('data') as $key =>$value){
                $id=$key;
            }
            $item=WaybillEproduct::find($id);
            $item->check_add=1;
            if($item->save()){
                return array('data'=>[]);
            }
        }
    }


}
