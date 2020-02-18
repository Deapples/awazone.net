<?php

namespace App\Http\Controllers;

use App\Pair;
use App\StageFive;
use App\StageFour;
use App\StageThree;
use App\StageTwo;
use App\User;
use Illuminate\Http\Request;

class StageOnePaymentsController extends Controller
{
    //
    public function payStageOne(){
        //check requirements
        //check paired
         // check checked
        $isPairedAndChecked = User::where('paired', true)->where('status', 'cleared')->get();
       
        foreach($isPairedAndChecked as $passed){
           // /check stage
           
           $stage = Pair::where('stage', 1)->where('root_id', $passed->id)->get();

        if((count($stage)) == 4 ){
            $getBal = User::where('id', $passed->id)->get();
            $bonus = $getBal[0]->balance + 6000;

            //pay 
            $pay = User::where('id', $passed->id)->update(['match_bonus' => 6000, 'balance' => $bonus, 'stage' => 2]);
            
        //if all passed, enter into stage 2.
            if($pay){
            //update stage
            Pair::where('user_id', $passed->id)->update(['stage'=> 2]);
            }
        }
    }
        

    }

    public function payStageTwo(){
        //check requirements
        //check paired
         // check checked
        $isPairedAndChecked =  User::where('stage', 2)->where('stageTwo', 'cleared');
       
        foreach($isPairedAndChecked as $passed){
           // /check stage
           
           $stage = StageTwo::where('stage', 2)->where('level', 2)->where('root_id', $passed->id)->get();

        if((count($stage)) == 8 ){
            $getBal = User::where('id', $passed->id)->get();
            $bonus = $getBal[0]->balance + 16800;
            //pay 
            $pay = User::where('id', $passed->id)->update(['balance' => $bonus, 'stage' => 3]);
            
        //if all passed, enter into stage 3.
            if($pay){
            //update stage
            Pair::where('user_id', $passed->id)->update(['stage'=> 3]);
            }
        }
    }
        

    }




    public function payStageThree(){
        //check requirements
        //check paired
         // check checked
        $isPairedAndChecked =  User::where('stage', 3)->where('stageThree', 'cleared');
       
        foreach($isPairedAndChecked as $passed){
           // /check stage
           
           $stage = StageThree::where('stage', 3)->where('level', 2)->where('root_id', $passed->id)->get();

        if((count($stage)) == 8){
            $getBal = User::where('id', $passed->id)->get();
            $bonus = $getBal[0]->balance + 47040;
            //pay 
            $pay = User::where('id', $passed->id)->update(['balance' => $bonus, 'stage' => 4]);
            
        //if all passed, enter into stage 4.
            if($pay){
            //update stage
            Pair::where('user_id', $passed->id)->update(['stage'=> 4]);
            }
        }
    }
        

    }


    public function payStageFour(){
        //check requirements
        //check paired
         // check checked
        $isPairedAndChecked =  User::where('stage', 4)->where('stageFour', 'cleared');
       
        foreach($isPairedAndChecked as $passed){
           // /check stage
           
           $stage = StageFour::where('stage', 4)->where('level', 2)->where('root_id', $passed->id)->get();

        if((count($stage)) == 8 ){
            $getBal = User::where('id', $passed->id)->get();
            $bonus = $getBal[0]->balance + 131712;
            //pay 
            $pay = User::where('id', $passed->id)->update(['balance' => $bonus, 'stage' => 5]);
            
        //if all passed, enter into stage 5.
            if($pay){
            //update stage
            Pair::where('user_id', $passed->id)->update(['stage'=> 5]);
            }
        }
    }
        

    }




    public function payStageFive(){
        //check requirements
        //check paired
         // check checked
        $isPairedAndChecked =  User::where('stage', 5)->where('stageFive', 'cleared');
       
        foreach($isPairedAndChecked as $passed){
           // /check stage
           
           $stage = StageFive::where('stage', 5)->where('level', 2)->where('root_id', $passed->id)->get();

        if((count($stage)) == 8 ){
            $getBal = User::where('id', $passed->id)->get();
            $bonus = $getBal[0]->balance + 368000;
            //pay 
            $pay = User::where('id', $passed->id)->update(['balance' => $bonus, 'stage' => 6]);
            
        //if all passed, enter into stage 6.
            if($pay){
            //update stage
            Pair::where('user_id', $passed->id)->update(['stage'=> 6]);
            }
        }
    }
        

    }



}
