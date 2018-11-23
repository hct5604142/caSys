<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserPassEditRequest;
use App\Models\Ua_uxr;
use App\Services\AppService;
use App\Services\UserService;
use App\Repositories\AppRepository;
use App\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PermissionManageController extends Controller
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

    public function showRolesList(){
        $users=User::select('id','name')->get();
        foreach ($users as $user){
            if(
            DB::table('ua_uxrs')
                ->join('roles','roles.id','=','ua_uxrs.rid')
                ->where('ua_uxrs.uid',$user->id)
                ->select('roles.name')
            ->exists()){

                    $temp= DB::table('ua_uxrs')
                    ->join('roles','roles.id','=','ua_uxrs.rid')
                    ->where('ua_uxrs.uid',$user->id)
                    ->select('roles.name')
                    ->get();
                    $roles=array();
                    for($i=0;$i<count($temp);$i++){
                        array_push($roles,$temp[$i]->name);
                    }
                    $user->roles=$roles;
                    $user->DT_RowId='1';
            }else{
                $user->roloes=null;
            }

        }
        return json_encode(array('data'=>$users->toArray()));
    }
}
