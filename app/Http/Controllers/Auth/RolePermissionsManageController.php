<?php

namespace App\Http\Controllers\Auth;

use App\Models\Pa_pxr;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RolePermissionsManageController extends Controller
{
    public function showRolesList($id=null){
        if($id!=null){
            $roles=Role::where('id',$id)->select('id','name')->get();
        }else{
            $roles=Role::all();
        }
        foreach ($roles as $role){
            if(
                DB::table('pa_pxrs')
                ->join('permissions','permissions.id','=','pa_pxrs.pid')
                ->where('pa_pxrs.rid',$role->id)
                ->select('permissions.name')
                ->exists()){

                $temp= DB::table('pa_pxrs')
                    ->join('permissions','pa_pxrs.pid','=','permissions.id')
                    ->where('pa_pxrs.rid',$role->id)
                    ->select('permissions.name')
                    ->get();
                $permissions=array();
                for($i=0;$i<count($temp);$i++){
                    array_push($permissions,$temp[$i]->name);
                }
                $role->permissions=$permissions;
//                    $user->DT_RowId=$user->id;
            }else{
                $role->permissions=null;
            }

        }
        return json_encode(array('data'=>$roles->toArray()));
    }

    public function  getAjaxPermissions(){
        $permissions=Permission::select('id','name')->get();
        return json_encode($permissions->toArray());
    }

    public function editRolePermission(Request $request){
        $id="";
        $content="";
        foreach($request->input('data') as $x=>$y){
            $id=$x;
            $content=$y;
        }
        Pa_pxr::where('rid',$id)->delete();
        for($i=0;$i<count($content['permissions']);$i++){
            $pxr=new Pa_pxr();
            $pxr->rid=$id;
            $pxr->pid=$content['permissions'][$i];
            $pxr->save();
        }
        return $this->showRolesList($id);
    }

    public  function  addRole(Request $request){
        $name="";
        foreach ($request->input('data') as $x=>$y){
            $name=$y['name'];
        }
        if(!strlen($name)){
            return array('error'=>['角色名称不能为空']);
        }
        $role=new Role();
        $role->name=$name;
        $role->save();
        return array('data'=>[$role->toArray()]);
    }

    public function removeRole(Request $request){
        $id="";
        foreach ($request->input('data') as $x=>$y){
            $id=$x;
        }
        Pa_pxr::where('rid',$id)->delete();
        if(Role::find($id)->delete()){
            return array('data'=>[]);
        }
    }

    public function editRoleName(Request $request){
        $id="";
        $content="";
        foreach ($request->input('data') as $x=>$y){
            $id=$x;
            $content=$y['name'];
        }
        if(!strlen($content)){
            return array('error'=>['角色名称不能为空']);
        }
        $role=Role::find($id);
        $role->name=$content;
        if($role->update()){
            return array('data'=>[$role->toArray()]);
        }

    }
}
