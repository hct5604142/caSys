<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Ua_uxr;
use App\Services\AppService;
use App\Services\UserService;
use App\Repositories\AppRepository;
use App\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleUserManageController extends Controller
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

    public function showRolesList($id=null){
        if($id!=null){
            $users=User::where('id',$id)->select('id','name')->get();
        }else{
            $users=User::select('id','name')->get();
        }
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
//                    $user->DT_RowId=$user->id;
            }else{
                $user->roloes=null;
            }

        }
        return json_encode(array('data'=>$users->toArray()));
    }

    public function  getAjaxRoles(){
        $roles=Role::select('id','name')->get();
        return json_encode($roles->toArray());
    }

    public function editUserRole(Request $request){
        $id="";
        $content="";
        foreach($request->input('data') as $x=>$y){
            $id=$x;
            $content=$y;
        }
        Ua_uxr::where('uid',$id)->delete();
        for($i=0;$i<count($content['roles']);$i++){
            $uxr=new Ua_uxr();
            $uxr->uid=$id;
            $uxr->rid=$content['roles'][$i];
            $uxr->save();
        }

        return $this->showRolesList($id);
       // dd($request->input('data'));
    }
}
