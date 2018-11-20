<?php

namespace App\Services;

use http\Env\Request;

class UserService
{
    private $userRepository;

    public function __construct($userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUserById($id)
    {
        return $this->userRepository->findById($id);
    }

    public function createUser($id,$name,$password)
    {
        return $this->successJsonFomate($this->userRepository->createUser($id,$name,$password));
    }
    public function getUserList(){
         $a = $this->userRepository->getUserList()->toArray();
        for ($i = 0; $i < count($a); $i++) {
          $a[$i]['DT_RowId'] = $a[$i]['id'];
        }
        $b = array("data" => $a);
        return json_encode($b, JSON_UNESCAPED_UNICODE);
    }

    public function updateUserName($request){
        $rd = $request->input('data');
        $id = "";
        $content = "";
        foreach ($rd as $x => $x_value) {
            $id = $x;
            $content = $x_value;
        }
        $user=$this->userRepository->saveUserName($id,$content['name']);
        return $this->successJsonFomate($user);
    }

    protected  function  successJsonFomate($user){
        $user['DT_RowId'] = $user['id'];
        $user=array($user);
        $user =array('data'=>$user);
        return json_encode($user, JSON_UNESCAPED_UNICODE);
    }

}