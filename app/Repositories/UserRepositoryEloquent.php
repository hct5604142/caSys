<?php

namespace App\Repositories;

use App\Models\Ua_uxr;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\UserRepository;
use App\Models\User;
use App\Models\Role;
use App\Validators\UserValidator;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return UserValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function findById($id)
    {
        // TODO: Implement findById() method.
        $user=User::find($id);
        if($user!=null){
            return $user=User::find($id)->first()->get()[0];
        }else{
            return $user;
        }
    }

    public function createUser($id,$name,$password){
        $user=new User();
        $user->id=$id;
        $user->name=$name;
        $user->password=Hash::make($password);
        $user->state=1;
        try{
            if($user->save()){
               return $this->addRole($id,$user);
            }else{

            }
        }catch (\Exception $exception){
            return $exception->getMessage();
        }

    }
    public function getUserList(){
        $usersUn=User::all();
        $users=$this->getRoles($usersUn);
        return $users;
    }

    protected function getRoles($usersUn){
        foreach ($usersUn as $User){
            $ua_uxrs=Ua_uxr::where('uid',$User->id)->get();
            $roles="";
            foreach ($ua_uxrs as $ua_uxr){
                $roles=Role::find($ua_uxr->rid)->name;
            }
            $User->roles=$roles;
        }
        return $usersUn;
    }

    public function  saveUserName($id, $name){
        $user = User::find($id);
        $user->name=$name;
        $user->save();
        $user = User::find($id);
        return $this->addRole($id,$user);
    }

    protected function addRole($id,User $user){
        $ua_uxrs=Ua_uxr::where('uid',$id)->get();
        $roles="";
        foreach ($ua_uxrs as $ua_uxr){
            $roles=Role::find($ua_uxr->rid)->name;
        }
        $user->roles=$roles;
        $user->id=$id;
        $userWithRoles=$user->toArray();
        return $userWithRoles;
    }

}
