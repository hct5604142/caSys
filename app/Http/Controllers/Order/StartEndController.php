<?php

namespace App\Http\Controllers\Order;

use App\Models\StartendMailage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StartEndController extends Controller
{
    //
    public function showStartEndList(){
        return array('data'=>StartendMailage::all()->toArray());
    }

    public function update(Request $request)
    {
        if ($request->input('action') == 'create') {
            $start = null;
            $end = null;
            $mileage = null;
            foreach ($request->input('data') as $key => $value) {
                $start = $value['start'];
                $end = $value['end'];
                $mileage = $value['mileage'];
            }
            if (!StartendMailage::where('start', $start)->where('end', $end)->get()->count() == 0) {
                return array('error' => ['线路已存在']);
            }
            $item = new StartendMailage();
            $item->start = $start;
            $item->end = $end;
            $item->mileage = $mileage;
            if ($item->save()) {
                return array('data' => [$item->toArray()]);
            } else {
                return array('error' => ['保存失败']);
            }
        }
        if($request->input('action')=='edit'){
            $id=null;
            $start = null;
            $end = null;
            $mileage = null;
            foreach ($request->input('data') as $key => $value){
                $id=$key;
                if (array_key_exists('start', $value))
                {
                    $start=$value['start'];
                }
                if (array_key_exists('end', $value))
                {
                    $end=$value['end'];
                }
                if (array_key_exists('mileage', $value))
                {
                    $mileage=$value['mileage'];
                }
            }
            $item=StartendMailage::find($id);
            if(!$start==null){
                $item->start=$start;
            }
            if(!$end==null){
                $item->end=$end;
            }
            if(!$mileage==null){
                $item->mileage=$mileage;
            }
            if($item->save()){
                return array('data'=>[StartendMailage::find($id)->toArray()]);
            }else{
                return array('error'=>['修改失败']);
            }
        }
        if($request->input('action')=='remove'){
            $id=null;
            foreach ($request->input('data') as $key =>$value){
                $id=$key;
            }
            if(StartendMailage::find($id)->delete()){
                return array('data'=>[]);
            }else{
                return array('error'=>['删除失败']);
            }
        }
    }
}
