<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Pair;

class MatricesController extends Controller
{
    //
    function makeMatrix(){
        $username = 'vero';
        $refer = 'Awazone';
        $parent_id = 2;
         //user id
         $usr = User::where('username', $username)
         ->get();
         $user_id = $usr[0]->id;
         
        $c = User::where('referral', '=' , $refer)->where('phone_number', '07068006837')->get();
        return count($c); exit;
        if($c->position !== 'left'){
            $pos = "right";
           
        }else{
            $pos = 'left';
        };   echo $pos; exit;
             // pair user
         $parent = User::where('username',$refer)->get();
         $parent_id = $parent[0]->id;

         $root = User::where('username', $parent[0]->referral)->get();
         $root_id = $root[0]->id;

         $pair = new Pair();
         $pair->user_id = $user_id;
         $pair->referral = $refer;
         $pair->parent_id = $parent_id;
         $pair->root_id = $root_id;
         $pair->stage = 1;
         $pair->level = 1;
         $pair->save();     
   
    }
}

/**
 *   
 *  // auto pair
 * 
                    $n_parent = ETM::where('status', 'uncleared')->where('level', '<', 2)->get()->first();
                    //check position
                   if(count($n_parent)>0) {
                        if($n_parent[0]->position == 'left'){
                        $position = 'right';
                        $level = 1;

                    }else{
                        $position = 'left';
                        $level = 2;
                    }
                     //enter without parent and root
                     $save = new ETM();
                     $save->user_id = $id;
                     $save->status = 'uncleared';
                     $save->parent_id = $n_parent[0]->user_id;
                     $save->root_id= $n_parent[0]->parent_id;
                     $save->stage = 1;
                     $save->level = $level;
                     $save->position = $position;

                }else{
                    //enter without parent and root
                    $save = new ETM();
                    $save->user_id = $id;
                    $save->status = 'uncleared';
                    $save->parent_id = 0;
                    $save->root_id= 0;
                    $save->stage = 1;
                    $save->level = $level;
                    $save->position = $position;
                }
                    
                }
 */
