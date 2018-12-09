<?php

namespace App\Http\Controllers\Order;

use App\Models\CarNoType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarNoTypeController extends Controller
{
    //
    public function showCarNoTypeList(){
        return array('data'=>CarNoType::all()->toArray());
    }

    public function update(Request $request){
        if($request->input('action')=='create'){
            $no=null;
            $type=null;
            foreach ($request->input('data') as $key=>$value){
                $no=$value['no'];
                $type=$value['type'];
            }
            $item=new CarNoType();
            $item->no=$no;
            $item->type=$type;
            if($item->save()){
                return array('data'=>[$item->toArray()]);
            }else{
                return array('data'=>['保存失败']);
            }
        }
        if($request->input('action')=='edit'){
            $id=null;
            $no=null;
            $type=null;
            foreach ($request->input('data') as $key =>$value){
                $id=$key;
                if (array_key_exists('no', $value))
                {
                    $no=$value['no'];
                }
                if (array_key_exists('type', $value))
                {
                    $type=$value['type'];
                }
                $item=CarNoType::find($id);
                if(!$no==null){
                    $item->no=$no;
                }
                if(!$type==null){
                    $item->type=$type;
                }
                if($item->save()){
                    return array('data'=>[CarNoType::find($id)->toArray()]);
                }else{
                    return array('error'=>['保存失败']);
                }
            }
        }
        if($request->input('action')=='remove'){
            $id=null;
            foreach ($request->input('data') as $key=>$value){
                $id=$key;
            }
            if(CarNoType::find($id)->delete()){
                return array('data'=>['']);
            }else{
                return array('error'=>['删除失败']);
            }
        }
    }

}
