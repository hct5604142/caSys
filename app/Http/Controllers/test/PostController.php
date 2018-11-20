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

    public function createAjax()
    {
        $a = User::all()->toArray();
        for ($i = 0; $i < count($a); $i++) {
            $a[$i]['DT_RowId'] = $a[$i]['id'];
        }
        $b = array("data" => $a);
        return json_encode($b, JSON_UNESCAPED_UNICODE);

    }

    public function createAjax2(Request $request)
    {
        $a = $request->input('data');
        $name = "";
        $content = "";
        foreach ($a as $x => $x_value) {
            $name = $x;
            $content = $x_value;
        }
        $user = User::find($name);
        $b = array();
        $b['id'] = $user->id;
        $b['name'] = $content['name'];
        $b['password'] = $user->password;
        $b['DT_RowId'] = $user->id;
        $b['created_at'] = '1988-10-18';
        $b['updated_at'] = '1987-10-19';
        $b['state'] = $user->state;
        $c = array($b);
        $c['data'] = $c;
        return json_encode($c, JSON_UNESCAPED_UNICODE);


    }
}
