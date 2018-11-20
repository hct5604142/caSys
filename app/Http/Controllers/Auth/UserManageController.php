<?php

namespace App\Http\Controllers\Auth;

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

    public function showUserList(){
        return $this->userService->getUserList();
    }
    public function updateName(Request $request){
        return $this->userService->updateUserName($request);
    }
}
