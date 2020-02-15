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
            if((count($parent)) > 0){

            $count = StageTwo::where('parent_id', $parent->user_id)->get();
            $root_id = $count->parent_id;

            //if less than 1 set position to be left
            if((count($count)< 1 ) ){


                $position = 'left';

                //insert into stageTwo table

                $pair = new StageTwo();
                $pair->user_id = $check->id;
                $pair->referral = 'NA';
                $pair->parent_id = $count->user_id;
                $pair->root_id = $root_id;
                $pair->position = $position;
                $pair->stage = 2;
                $pair->level = 1;
                $pair->save();     
             


            }else if((count($count))< 2){


                $position = 'right';
                //update level to be 2
                
                $pair = new StageTwo();
                $pair->user_id = $check->id;
                $pair->referral = 'NA';
                $pair->parent_id = $count->user_id;
                $pair->root_id = $root_id;
                $pair->position = $position;
                $pair->stage = 2;
                $pair->level = 2;
                $pair->save();  

                 //update users to be cleared
                 User::where('id', $check->id)->update(['stageTwo'=> 'cleared']);

            }
        }else{
            //do nothing
            //exit process
            exit;
        }
        }
        
        
        //parent of your parent is your root

        
    }
}
