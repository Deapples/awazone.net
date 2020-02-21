<?php

namespace App\Http\Controllers;

use App\Pair;
use App\User;
use Illuminate\Http\Request;

class TreesController extends Controller
{
    //
    /**
     * @param request
     * @return tree view
     */
    function getTree(){

        if((session('id')== null)){
            return redirect('/login');
        }else{
            //initialize all children 
            $child1 = "Not Filled";
                $child3 = "Not Filled";
                $child4 = "Not Filled";
                $child2 = "Not Filled";
                $child5 = "Not Filled";
                $child6 = "Not Filled";



            $id = session('id');
            $user = User::where('id', $id)->get(); // get user's data 

            $pair = Pair::where('user_id', $id)->get(); //set up tree value

           if (count($pair) > 0){
            $getParent = User::where('id', $pair[0]->parent_id)->get();
            $parent = $getParent[0]->username;
            

           }else{
               $parent = "No parent";
           }

          
           
            $children = Pair::where('parent_id', $id)->get();
            if($children){
                 $left_child = User::where('id', $children[0]->user_id)->get();
                 $child1 = $left_child[0]->username;
                 if(count($children) > 1){
                    $right_child = User::where('id', $children[1]->user_id)->get();
                   
                    if ($right_child){
                        $child2 = $right_child[0]->username;
                    }else{
                        $child2 = "Not Filled";
                    }
                 }else{
                    $child2 = "Not Filled";
                }
            }else{
                $child1 = "Not Filled";
                $child3 = "Not Filled";
                $child4 = "Not Filled";
                $child2 = "Not Filled";
                $child5 = "Not Filled";
                $child6 = "Not Filled";
            }
            
            $data = $user[0];
            return view('tree', ['data' => $data, 'pair' => $pair, 
            'child1' => $child1, 'child_2' => $child2, 'child3' => $child3,
            'child4' => $child4, 'child5' => $child5, 'child6' => $child6,
            'parent' => $parent

            ]);

        }

    }
}
