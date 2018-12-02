<?php

namespace App\Http\Controllers\Formula;

use App\Http\Requests\Formula\BasePriceAddRequest;
use App\Models\BasePrice;
use App\Models\PriceUnit;
use App\Providers\BroadcastServiceProvider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BasePriceController extends Controller
{
    //
    public function showBasePriceList(){
        $basePrices=BasePrice::all();
        foreach ($basePrices as $basePrice){
            $basePrice->unit_name=PriceUnit::find($basePrice->unit_id)->unit_name;
        }
        return array('data'=>$basePrices->toArray());
    }
    public function  updateBasePrice(Request $request){
        $id=null;
        $class_main=null;
        $class_sub=null;
        $base_price=null;
        $unit_id=null;
        $distance=null;
        $linkage=null;
        $remark=null;
        foreach ($request->input('data') as $key=>$value){
            $id=$key;
            if (array_key_exists('class_main', $value))
            {
                $class_main=$value['class_main'];
            }
            if (array_key_exists('class_sub', $value))
            {
                $class_sub=$value['class_sub'];
            }
            if (array_key_exists('base_price', $value))
            {
                $base_price=$value['base_price'];
            }
            if (array_key_exists('unit_name', $value))
            {
                $unit_id=$value['unit_name'];
            }
            if (array_key_exists('distance', $value))
            {
                $distance=$value['distance'];
            }
            if (array_key_exists('linkage', $value))
            {
                $linkage=$value['linkage'];
            }
            if (array_key_exists('remark', $value))
            {
                $remark=$value['remark'];
            }
        }
        $base_price_item=BasePrice::find($id);
        if( $class_main!=null){
            $base_price_item->class_main=$class_main;
        }
        if( $class_sub!=null){
            $base_price_item->class_sub=$class_sub;
        }
        if( $base_price!=null){
            $base_price_item->base_price=$base_price;
        }
        if( $unit_id!=null){
            $unit_name=PriceUnit::find($unit_id)->unit_name;
            $base_price_item->unit_id=$unit_id;
            if($base_price_item->save()){
                $base_price_item->unit_name=$unit_name;
                return array('data'=>[$base_price_item->toArray()]);
            }else{
                return array('error'=>[更新失败]);
            }
        }
        if( $distance!=null){
            $base_price_item->distance=$distance;
        }
        if( $linkage!=null){
            $base_price_item->linkage=$linkage;
        }
            $base_price_item->remark=$remark;
        if($base_price_item->save()){
            return array('data'=>[$base_price_item->toArray()]);
        }else{
            return array('error'=>[更新失败]);
        }
    }

    public function addBasePrice(BasePriceAddRequest $request){
        $class_main=null;
        $class_sub=null;
        $base_price=null;
        $unit_id=null;
        $distance=null;
        $linkage=null;
        $remark=null;
        foreach ($request->input('data') as $key=>$value){
            $class_main=$value['class_main'];
            $class_sub=$value['class_sub'];
            $base_price=$value['base_price'];
            $unit_id=$value['unit_name'];
            $distance=$value['distance'];
            $linkage=$value['linkage'];
            $remark=$value['remark'];
        }
        $base_priceItem=new BasePrice();
        $base_priceItem->class_main=$class_main;
        $base_priceItem->class_sub=$class_sub;
        $base_priceItem->base_price=$base_price;
        $base_priceItem->unit_id=$unit_id;
        $base_priceItem->distance=$distance;
        $base_priceItem->linkage=$linkage;
        $base_priceItem->remark=$remark;
        if($base_priceItem->save()){
            $base_priceItem->unit_name=PriceUnit::find($base_priceItem->unit_id)->unit_name;
            return array('data'=>[$base_priceItem->toArray()]);
        }else{
            return array('data'=>['创建失败']);
        }
    }
    public function delBasePrice(Request $request){
        $id=null;
        foreach ($request->input('data') as $key=>$value){
            $id=$key;
        }
        if(BasePrice::find($id)->delete()){
            return array('data'=>[]);
        }else{
            return array('error'=>['删除失败']);
        }
    }
    public function getAjaxUnits(){
        $units=PriceUnit::select(['id','unit_name'])->get();
        return $units->toArray();
    }
}
