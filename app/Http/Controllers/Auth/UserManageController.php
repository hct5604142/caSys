<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AppService;
use App\Repositories\AppRepository;
use App\Models\User;

class UserManageController extends Controller
{
    //
    private $appService;
    public function __construct(AppRepository $appRepository)
    {
        $this->appService=new AppService($appRepository);
    }
    public function show(){
        $id=2;
        $title=$this->appService->getClassifyName($id);
        $crumbs=$this->appService->getCrumbs($id);
        $users=User::all()->toJson();
        return view('layers.auth.user_manage',compact('title','crumbs','users'));
    }
}
