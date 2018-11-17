<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ua_uxr;
use App\Models\Pa_pxr;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    private $userService;
    public function __construct(UserRepository $userRepository)
    {
        $this->userService=new UserService($userRepository);
    }

    public function login(Request $request)
    {
        $user=$this->userService->getUserById($request->input('id'));
        if($user==null){
            return back()->with('status','无此账户');
        }else{
            if(Hash::check($request->input('password'),$user->password)){
                $this->setUserSession($user,$request);
                return redirect('dashboard');
            }else{
                return back()->with('status','账户或密码错误');
            }
        }
    }


     private function setUserSession(User $user,Request $request){
         $ua_uxrs=Ua_uxr::where('uid',$user->id)->get();
         $roles="";
         $permissions="";
         foreach ($ua_uxrs as $ua_uxr){
             $roles=$roles.$ua_uxr->rid.',';
             $pa_pxrs=Pa_pxr::where('rid',$ua_uxr->rid)->get();
             foreach ($pa_pxrs as $pa_pxr){
                 $permissions=$permissions.$pa_pxr->pid.',';
             }
         }
         $request->session()->put('uid',$user->id);
         $request->session()->put('login',true);
         $request->session()->put('rid',$roles);
         $request->session()->put('permission',$permissions);
     }
}
