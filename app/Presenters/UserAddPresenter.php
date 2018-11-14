<?php

namespace App\Presenters;

class UserAddPresenter
{
    public function showError($errors){
        if($errors=='[]'){
            return null;
        }else{
            foreach ($errors->all() as $value){
                return $value;
            }
        }
    }
}
