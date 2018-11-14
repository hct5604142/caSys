<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserAddRequest;
use App\Repositories\AppRepository;
use App\Repositories\UserRepository;
use App\Services\AppService;
use App\Services\UserService;

class userAddController extends Controller
{
    //
    private $userService;
    private $appService;
    public function __construct(UserRepository $userRepository,AppRepository $appRepository)
    {
        $this->userService=new UserService($userRepository);
        $this->appService=new AppService($appRepository);
    }
    //方式：Get
    //描述：显示增加用户界面
    public function show(){
        $id=5;
        $title=$this->appService->getClassifyName($id);
        $crumbs=$this->appService->getCrumbs($id);
        return view('layers.auth.add_user',compact('title','crumbs','crumbs'));
    }

    public function save(UserAddRequest $userAddRequest){
        $state=$this->userService->createUser($userAddRequest->input('user_id'),$userAddRequest->input('user_name'),$userAddRequest->input('user_password'));
        return redirect()->back()->with('state',$state);
    }
}
