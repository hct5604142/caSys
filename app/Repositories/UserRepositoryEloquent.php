<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\UserRepository;
use App\Models\User;
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
        try{
            $user->save();
            return '保存成功';
        }catch (\Exception $exception){
            return $exception->getMessage();
        }

    }

}
