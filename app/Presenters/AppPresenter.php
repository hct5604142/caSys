<?php

namespace App\Presenters;

class AppPresenter
{
    public function showCrumbs($message){
        if($message==null){
            return $message;
        }
       $htmlArray = json_decode($message);
       $htmlString = '';
        foreach($htmlArray as $x=>$x_value) {
            if($x!="首页"){
                $htmlString ='/<a href="'.$x_value.'">'.$x.'</a>'.$htmlString;
            }else{
                $htmlString ='<a href="'.$x_value.'">'.$x.'</a>'.$htmlString;
            }
        }
        return($htmlString);

    }
}
