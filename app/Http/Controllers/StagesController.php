<?php

namespace App\Http\Controllers;

use App\StageFive;
use App\StageFour;
use App\StageThree;
use App\StageTwo;
use App\User;
use Illuminate\Http\Request;

class StagesController extends Controller
{
    //
    public function stageTwo(){
     
          /* //set the person to be paired */
        
        $parent = User::where('stage', 2)->where('stageTwo', 'uncleared')->first();
        
        if($parent){
        //check if the  first person to enter stage 2 has been paired
        $checkStage = User::where('stage', 2)->where('stageTwo', 'uncleared')->where('id', '!=', $parent->id )->get();
        
        if ($checkStage){
        //count where the user_id appears as parent Id
        foreach($checkStage as $check){

            /*$parent = StageTwo::where('parent_id', $parent->id)->where('level', '<', 2)->get()->first();
            if((count($parent)) > 0){*/

            $count = StageTwo::where('parent_id', $parent->id)->get();
                    if(count($count)< 1){
                        $root_id = 0;
                    }else{
                        $root_id = $count->parent_id;
                    }
                    

            //if less than 1 set position to be left
            if((count($count)< 1 ) ){


                $position = 'left';

                //insert into stageTwo table

                $pair = new StageTwo();
                $pair->user_id = $check->id;
                $pair->referral = 'NA';
                $pair->parent_id = $parent->id;
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
                $pair->parent_id = $parent->id;
                $pair->root_id = $root_id;
                $pair->position = $position;
                $pair->stage = 2;
                $pair->level = 2;
                $pair->save();  

                 //update users to be cleared
                 User::where('id', $parent->id)->update(['stageTwo'=> 'cleared']);

            }else{
                //look for the next user
                $parent = User::where('stage', 2)->where('stageTwo', 'uncleared')->first();
            }
        /*}else{
            //do nothing
            //exit process
            exit;
        }*/
        }
    }else{
        echo "Nobodody to pair $parent->username with";
        exit;
    }
        
    }else{
        echo "Nothing to pair";
        die;
    }
        //parent of your parent is your root

        
    }


    public function stageThree(){
       
     
            /* //set the person to be paired */
          
          $parent = User::where('stage', 3)->where('stageThree', 'uncleared')->first();
          
          if($parent){
          //check if the  first person to enter stage 2 has been paired
          $checkStage = User::where('stage', 3)->where('stageThree', 'uncleared')->where('id', '!=', $parent->id )->get();
          
          if ($checkStage){
          //count where the user_id appears as parent Id
          foreach($checkStage as $check){
  
              /*$parent = StageTwo::where('parent_id', $parent->id)->where('level', '<', 2)->get()->first();
              if((count($parent)) > 0){*/
  
              $count = StageThree::where('parent_id', $parent->id)->get();
                    if(count($count)< 1){
                        $root_id = 0;
                    }else{
                        $root_id = $count->parent_id;
                    }
             
  
              //if less than 1 set position to be left
              if((count($count)< 1 ) ){
  
  
                  $position = 'left';
  
                  //insert into stageThree table
  
                  $pair = new StageThree();
                  $pair->user_id = $check->id;
                  $pair->referral = 'NA';
                  $pair->parent_id = $parent->id;
                  $pair->root_id = $root_id;
                  $pair->position = $position;
                  $pair->stage = 3;
                  $pair->level = 1;
                  $pair->save();     
               
  
  
              }else if((count($count))< 2){
  
  
                  $position = 'right';
                  //update level to be 2
                  
                  $pair = new StageThree();
                  $pair->user_id = $check->id;
                  $pair->referral = 'NA';
                  $pair->parent_id = $parent->id;
                  $pair->root_id = $root_id;
                  $pair->position = $position;
                  $pair->stage = 3;
                  $pair->level = 2;
                  $pair->save();  
  
                   //update users to be cleared
                   User::where('id', $parent->id)->update(['stageThree'=> 'cleared']);
  
              }else{
                  //look for the next user
                  $parent = User::where('stage', 3)->where('stageThree', 'uncleared')->first();
              }
          /*}else{
              //do nothing
              //exit process
              exit;
          }*/
          }
      }else{
          echo "Nobodody to pair $parent->username with";
          exit;
      }
          
      }else{
          echo "Nothing to pair";
          die;
      }
          //parent of your parent is your root
  
          
    }


    public function stageFour(){
       
     
        /* //set the person to be paired */
      
      $parent = User::where('stage', 4)->where('stageFour', 'uncleared')->first();
      
      if($parent){
      //check if the  first person to enter stage 2 has been paired
      $checkStage = User::where('stage', 4)->where('stageFour', 'uncleared')->where('id', '!=', $parent->id )->get();
      
      if ($checkStage){
      //count where the user_id appears as parent Id
      foreach($checkStage as $check){

          /*$parent = StageTwo::where('parent_id', $parent->id)->where('level', '<', 2)->get()->first();
          if((count($parent)) > 0){*/

          $count = StageFour::where('parent_id', $parent->id)->get();
                if(count($count)< 1){
                    $root_id = 0;
                }else{
                    $root_id = $count->parent_id;
                }

          //if less than 1 set position to be left
          if((count($count)< 1 ) ){


              $position = 'left';

              //insert into stageFour table

              $pair = new StageFour();
              $pair->user_id = $check->id;
              $pair->referral = 'NA';
              $pair->parent_id = $parent->id;
              $pair->root_id = $root_id;
              $pair->position = $position;
              $pair->stage = 4;
              $pair->level = 1;
              $pair->save();     
           


          }else if((count($count))< 2){


              $position = 'right';
              //update level to be 2
              
              $pair = new StageFour();
              $pair->user_id = $check->id;
              $pair->referral = 'NA';
              $pair->parent_id = $parent->id;
              $pair->root_id = $root_id;
              $pair->position = $position;
              $pair->stage = 4;
              $pair->level = 2;
              $pair->save();  

               //update users to be cleared
               User::where('id', $parent->id)->update(['stageFour'=> 'cleared']);

          }else{
              //look for the next user
              $parent = User::where('stage', 4)->where('stageFour', 'uncleared')->first();
          }
      /*}else{
          //do nothing
          //exit process
          exit;
      }*/
      }
  }else{
      echo "Nobodody to pair $parent->username with";
      exit;
  }
      
  }else{
      echo "Nothing to pair";
      die;
  }
      //parent of your parent is your root

      
}




public function stageFive(){
       
     
    /* //set the person to be paired */
  
  $parent = User::where('stage', 5)->where('stageFive', 'uncleared')->first();
  
  if($parent){
  //check if the  first person to enter stage 2 has been paired
  $checkStage = User::where('stage', 5)->where('stageFive', 'uncleared')->where('id', '!=', $parent->id )->get();
  
  if ($checkStage){
  //count where the user_id appears as parent Id
  foreach($checkStage as $check){


      $count = StageFive::where('parent_id', $parent->id)->get();
            if(count($count)< 1){
                $root_id = 0;
            }else{
                $root_id = $count->parent_id;
            }
      

      //if less than 1 set position to be left
      if((count($count)< 1 ) ){


          $position = 'left';

          //insert into stageFive table

          $pair = new StageFive();
          $pair->user_id = $check->id;
          $pair->referral = 'NA';
          $pair->parent_id = $parent->id;
          $pair->root_id = $root_id;
          $pair->position = $position;
          $pair->stage = 5;
          $pair->level = 1;
          $pair->save();     
       


      }else if((count($count))< 2){


          $position = 'right';
          //update level to be 2
          
          $pair = new StageFive();
          $pair->user_id = $check->id;
          $pair->referral = 'NA';
          $pair->parent_id = $parent->id;
          $pair->root_id = $root_id;
          $pair->position = $position;
          $pair->stage = 5;
          $pair->level = 2;
          $pair->save();  

           //update users to be cleared
           User::where('id', $parent->id)->update(['stageFive'=> 'cleared']);

      }else{
          //look for the next user
          $parent = User::where('stage', 5)->where('stageFive', 'uncleared')->first();
      }
  /*}else{
      //do nothing
      //exit process
      exit;
  }*/
  }
}else{
  echo "Nobodody to pair $parent->username with";
  exit;
}
  
}else{
  echo "Nothing to pair";
  die;
}
  //parent of your parent is your root

  
}




}
