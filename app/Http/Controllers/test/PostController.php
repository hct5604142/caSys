<?php

namespace App\Http\Controllers\test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use function MongoDB\BSON\toJSON;
use PhpParser\Node\Expr\Array_;

class PostController extends Controller
{
    //
    public function createAjax(Request $request){
        $a=User::all()->toArray();
        for($i=0;$i<count($a);$i++){
            $a[$i]['DT_RowId']='row_'.$i;
        }
        $b=array("data"=>$a);
        return json_encode($b,JSON_UNESCAPED_UNICODE);

    }
}
