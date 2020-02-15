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

            $parent = StageTwo::where('level', '<', 2)->get()->first();

            $count = StageTwo::where('parent_id', $parent->id)->get();

            //if less than 1 set position to be left
            if((count($count)< 1 ) ){
                $position = 'left';
                //update level to be 1
            }else if((count($count))< 2){
                $position = 'right';
                //update users to be cleared
                User::where('id', $check->id)->update(['stageTwo'=> 'cleared']);
                //update level to be 2
            }

        }
        
        
        //parent of your parent is your root

        
    }
}
