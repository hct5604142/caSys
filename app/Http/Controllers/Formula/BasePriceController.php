<?php

namespace App\Http\Controllers\Formula;

use App\Models\BasePrice;
use App\Models\PriceUnit;
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
}
