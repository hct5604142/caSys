<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ua_uxr;
use App\Models\Pa_pxr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
            $user = User::find($request->input('id'));
            if($user==null){
                echo '用户名或密码错误';
            }else{
                if(Hash::check($request->input('password'),$user->password)){
                    $ua_uxrs=Ua_uxr::where('uid',$user->id)->get();
                    $permission="";
                    dump($ua_uxrs);
                    foreach ($ua_uxrs as $ua_uxr){
                        $pa_pxrs=Pa_pxr::where('rid',$ua_uxr->rid)->get();
                        foreach ($pa_pxrs as $pa_pxr){
                            $permission=$permission.$pa_pxr->pid.',';
                        }
                    }
                    $request->session()->put('uid',$user->id);
                    $request->session()->put('login',true);
                    $request->session()->put('permission',$permission);
                    $request->session()->save();

                   return redirect('dashbord');
                }else{
                    echo '用户名或密码错误';
                }
            }
    }
}
