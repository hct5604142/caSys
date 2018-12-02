<?php

namespace App\Http\Controllers\Formula;

use App\Models\PriceUnit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UnitManageController extends Controller
{
    //
    public function showUnitList(){
        $units=PriceUnit::all();
        return array('data'=>$units->toArray());
    }
    public function updateUnit(Request $request){
        if($request->input('action')=='edit'){
            $id=null;
            $unit_name=null;
            foreach ($request->input('data') as $key=>$value){
                $id=$key;
                if(array_key_exists('unit_name', $value)){
                    $unit_name=$value['unit_name'];
                }
            }
            $unit=PriceUnit::find($id);
            if($unit_name!=null){
                $unit->unit_name=$unit_name;
            }
            if($unit->save()){
                return array('data'=>[$unit->toArray()]);
            }
        }
        if($request->input('action')=='create'){
            $unit_name=null;
            foreach ($request->input('data') as $key=>$value){
                $unit_name=$value['unit_name'];
            }
            $unitItem=new PriceUnit();
            $unitItem->unit_name=$unit_name;
            if($unitItem->save()){
                return array('data'=>[$unitItem->toArray()]);
            }else{
                return array('error'=>['保存失败']);
            }
        }
        if($request->input('action')=='remove'){
            $id=null;
            foreach ($request->input('data') as $key=>$value){
                $id=$key;
            }
            if(PriceUnit::find($id)->delete()){
                return array('data'=>[]);
            }else{
                return array('error'=>['删除失败']);
            }
        }

    }


}
