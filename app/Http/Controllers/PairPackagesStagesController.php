<?php

namespace App\Http\Controllers;

use App\ED;
use App\EL;
use App\ETM;
use App\GVP;
use App\ND;
use App\RD;
use App\RVP;
use App\User;
use Illuminate\Http\Request;

class PairPackagesStagesController extends Controller
{
    //
    /**
     * @return paired users
     */
    public function pairUsers(){
        function pairing($package, $id, $stage){
            //check user not to be in AIBO
            //check parent
            //if no parent stand alone
            $parent = $package::where('stage', $stage)->where('level', '<', 2)->where('status', 'uncleared')->get()->first();
            if ($parent){
                //pair
                //check parent's position
                if($parent->position == 'left'){
                    $pair = new $package();
                    $pair->user_id = $id;
                    $pair->parent_id = $parent->user_id;
                    $pair->root_id = $parent->parent_id;
                    $pair->level = 2;
                    $pair->status = 'cleared';
                    $pair->position = 'right';
                    $pair->stage = $stage;
                    $pair->save();
                }else{
                    $pair = new $package();
                    $pair->user_id = $id;
                    $pair->parent_id = $parent->user_id;
                    $pair->root_id = $parent->parent_id;
                    $pair->level = 1;
                    $pair->status = 'uncleared';
                    $pair->position = 'left';
                    $pair->stage = $stage;
                    $pair->save();
                }
            }else{
                //pair no parent
                $pair = new $package();
                $pair->user_id = $id;
                $pair->parent_id = 0;
                $pair->root_id = 0;
                $pair->level = 0;
                $pair->status = 'uncleared';
                $pair->position = 'float';
                $pair->stage = $stage;
                $pair->save();
            }

           
        }

        $users = User::where('Package', '!=', 'AIBO')->get();

        foreach( $users as $user){
            $package = $user->Package;
            $id = $user->id;
            $stage = 2;
            //get stage 
            for($stage ; $stage <= 10; $stage++){
                //run function
                pairing($package, $id, $stage);
            }
            
        }
    }
}
