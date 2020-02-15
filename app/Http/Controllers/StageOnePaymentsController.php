<?php

namespace App\Http\Controllers;

use App\Pair;
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

            //pay 
            $pay = User::where('id', $passed->id)->update(['match_bonus' => 6000, 'stage' => 2]);
            
        //if all passed, enter into stage 2.
            if($pay){
            //update stage
            Pair::where('user_id', $passed->id)->update(['stage'=> 2]);
            }
        }
    }
        

    }
}
