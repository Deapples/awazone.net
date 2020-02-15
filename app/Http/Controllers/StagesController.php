<?php

namespace App\Http\Controllers;

use App\StageTwo;
use App\User;
use Illuminate\Http\Request;

class StagesController extends Controller
{
    //
    public function stageTwo(){
        //check if the  first person to enter stage 2 has been paired
        $checkStage = User::where('stage', 2)->where('stageTwo', 'uncleared')->get();
        //count where the user_id appears as parent Id
        foreach($checkStage as $check){

            $count = StageTwo::where('parent_id', $check->id)->get();

            //if less than 1 set position to be left
            if((count($count)< 1 ) ){
                $position = 'left';
            }else if((count($count))< 2){
                $position = 'right';
                //update users to be cleared
                User::where('id', $check->id)->update(['stageTwo'=> 'cleared']);
            }

        }
        
        
        //parent of your parent is your root

        
    }
}
