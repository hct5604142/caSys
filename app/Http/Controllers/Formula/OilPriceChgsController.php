<?php

namespace App\Http\Controllers\Formula;

use App\Models\OilPriceChg;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OilPriceChgsController extends Controller
{
    //
    public function showChgsList(){
        $chgs=OilPriceChg::all();
        return array('data'=>$chgs->toArray());
    }

    public function  lspUpdate(Request $request){
        $id='';
        $lsp=null;
        $ip=null;
        foreach ($request->input('data') as $key=>$value){
            $id=$key;
            if (array_key_exists('lsp', $value))
            {
                $lsp=$value['lsp'];
            }
            if (array_key_exists('ip', $value)) {
                $ip=$value['ip'];
            }
        }
        $opc=OilPriceChg::find($id);
        if($lsp!=null){
            $opc->lsp=1.00*$lsp;
        }
        if($ip!=null){
            $opc->ip=1.00*$ip;
        }
       if($opc->save()){
            return array('data'=>[OilPriceChg::find($id)->toArray()]);
        }else{
            return array('error'=>['更新未成功']);
        }
    }
    public function getArgs(){
        return (OilPriceChg::select('lsp','ip')->first()->toArray());
    }


}
