<?php

namespace App\Http\Controllers\Auth;

use App\Models\Ua_uxr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AppService;
use App\Services\UserService;
use App\Repositories\AppRepository;
use App\Repositories\UserRepository;
use App\Models\User;

class UserManageController extends Controller
{
    //
    private $userService;
    private $appService;
    public function __construct(UserRepository $userRepository,AppRepository $appRepository)
    {
        $this->userService=new UserService($userRepository);
        $this->appService=new AppService($appRepository);
    }

    public function show()
    {
        $id = 2;
        $title = $this->appService->getClassifyName($id);
        $crumbs = $this->appService->getCrumbs($id);
        $users = User::all()->toJson();
        return view('layers.auth.user_manage', compact('title', 'crumbs', 'users'));
    }

    //显示用户列表
    //datatype:json
    //方式:ajax
    public function showUserList(){
        return $this->userService->getUserList();
    }

    //更新用户姓名
    //datatype:json
    //方式:ajax
    public function updateName(Request $request){
        return $this->userService->updateUserName($request);
    }

    //删除用户
    //datatype:json
    //方式:ajax
    public function delUser(Request $request){
        $id="";
        foreach ($request->input('data') as $x=>$y){
            $id=$x;
        }
        $state=User::find($id)->delete();
        $roles=Ua_uxr::where('uid',$id)->get();
        foreach ($roles as $Ua_uxr) {
            $Ua_uxr->delete();
        }
        if($state==1){
            return json_encode(array('data'=>''));
        }
    }
}
