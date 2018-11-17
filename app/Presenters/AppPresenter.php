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
                $htmlString ='<li><button type="button" class="btn margin"><a href="'.$x_value.'">'.$x.'</a></button></li>'.$htmlString;
        }
        return($htmlString);

    }
}
