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
         //user id
         $usr = User::where('username', $username)
         ->get();
         $user_id = $usr[0]->id;
         

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
