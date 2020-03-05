<?php

namespace App\Http\Controllers;

use App\ED;
use App\EL;
use App\ETM;
use App\GVP;
use App\ND;
use App\RD;
use App\RVP;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    //
    /**
     * @return corresponding package pay out
     */

     public function packagePayment(){
          //put package and id as function parameter
          function payOut($package, $id, $stage){

           $count = $package::where('root_id', $id)->where('stage', $stage)->where('status', 'cleared')->get();

           if ($stage == 1){
               //check for four root_id
               if(count($count)< 4){
                   echo "Not Ripe for payment";
               }else{
                   //add payment to balance
                  $getBalance = User::findOrFail($id);
                  if($package == 'ETM'){
                    $bal = $getBalance->balance + 24000;
                    //add to transaction history 
                    $addToHist = new Transaction();
                    $addToHist->user_id = $id;
                    $addToHist->description = 'ETM stage 1 payout';
                    $addToHist->amount = 24000;
                    $addToHist->save();

                    //update user's balance

                    User::where('id', $id)->update(['balance' => $bal]);

                    $package::where('id', $id)->update(['stage'=> 2]);


                  }else if($package == 'EL'){
                    $bal = $getBalance->balance + 48000;
                    $addToHist = new Transaction();
                    $addToHist->user_id = $id;
                    $addToHist->description = 'EL stage 1 payout';
                    $addToHist->amount = 48000;
                    $addToHist->save();

                    //update user's balance

                    User::where('id', $id)->update(['balance' => $bal]);

                    $package::where('id', $id)->update(['stage'=> 2]);

                  }else if($package == 'ED'){
                    $bal = $getBalance->balance + 72000;
                    $addToHist = new Transaction();
                    $addToHist->user_id = $id;
                    $addToHist->description = 'ED stage 1 payout';
                    $addToHist->amount = 72000;
                    $addToHist->save();

                    //update user's balance

                    User::where('id', $id)->update(['balance' => $bal]);

                    $package::where('id', $id)->update(['stage'=> 2]);


                  }else if($package == 'RD'){
                    $bal = $getBalance->balance + 144000;
                    $addToHist = new Transaction();
                    $addToHist->user_id = $id;
                    $addToHist->description = 'RD stage 1 payout';
                    $addToHist->amount = 144000;
                    $addToHist->save();

                    //update user's balance

                    User::where('id', $id)->update(['balance' => $bal]);

                    $package::where('id', $id)->update(['stage'=> 2]);


                  }else if($package == 'ND'){
                    $bal = $getBalance->balance + 300000;
                    $addToHist = new Transaction();
                    $addToHist->user_id = $id;
                    $addToHist->description = 'ND stage 1 payout';
                    $addToHist->amount = 300000;
                    $addToHist->save();

                    //update user's balance

                    User::where('id', $id)->update(['balance' => $bal]);

                    $package::where('id', $id)->update(['stage'=> 2]);

                  }else if($package == 'RVP'){
                    $bal = $getBalance->balance + 600000;
                    $addToHist = new Transaction();
                    $addToHist->user_id = $id;
                    $addToHist->description = 'RVP stage 1 payout';
                    $addToHist->amount = 600000;
                    $addToHist->save();

                    //update user's balance

                    User::where('id', $id)->update(['balance' => $bal]);

                    $package::where('id', $id)->update(['stage'=> 2]);

                  }else{
                    /*$bal = $getBalance->balance + 48000;
                    $addToHist = new Transaction();
                    $addToHist->user_id = $id;
                    $addToHist->description = 'GVP stage 1 payout';
                    $addToHist->amount = 48000;
                    $addToHist->save();

                    //update user's balance

                    User::where('id', $id)->update(['balance' => $bal]);
                    $package::where('id', $id)->update(['stage'=> 2]);*/
                  }
                  
               }
           }else if($stage > 1){
               if (count($count)< 8){
                    echo 'Not eligible to be paid for this stage';
               }else{
                    if($package == 'ETM'){
                        if ($stage == 2){
                            //pay and promote
                            $bal = $getBalance->balance + 65000;
                            $addToHist = new Transaction();
                            $addToHist->user_id = $id;
                            $addToHist->description = 'ETM stage 2 payout';
                            $addToHist->amount = 65000;
                            $addToHist->save();

                            //update user's balance

                            User::where('id', $id)->update(['balance' => $bal]);

                            $package::where('id', $id)->update(['stage'=> 3]);

                        }else if ($stage == 3){
                            //pay and promote
                            $bal = $getBalance->balance + 150000;
                            $addToHist = new Transaction();
                            $addToHist->user_id = $id;
                            $addToHist->description = 'ETM stage 3 payout';
                            $addToHist->amount = 150000;
                            $addToHist->save();

                            //update user's balance

                            User::where('id', $id)->update(['balance' => $bal]);

                            $package::where('id', $id)->update(['stage'=> 4]);

                        }else if ($stage == 4){
                            //pay and promote
                            $bal = $getBalance->balance + 160000;
                            $addToHist = new Transaction();
                            $addToHist->user_id = $id;
                            $addToHist->description = 'ETM stage 4 payout';
                            $addToHist->amount = 160000;
                            $addToHist->save();

                            //update user's balance

                            User::where('id', $id)->update(['balance' => $bal]);

                            $package::where('id', $id)->update(['stage'=> 5]);

                        }else  if ($stage == 5){
                            //pay and promote
                            $bal = $getBalance->balance + 1250000;
                            $addToHist = new Transaction();
                            $addToHist->user_id = $id;
                            $addToHist->description = 'ETM stage 5 payout';
                            $addToHist->amount = 1250000;
                            $addToHist->save();

                            //update user's balance

                            User::where('id', $id)->update(['balance' => $bal]);

                            $package::where('id', $id)->update(['stage'=> 6]);

                        }else   if ($stage == 6){
                            //pay and promote
                            $bal = $getBalance->balance + 3600000;
                            $addToHist = new Transaction();
                            $addToHist->user_id = $id;
                            $addToHist->description = 'ETM stage 6 payout';
                            $addToHist->amount = 3600000;
                            $addToHist->save();

                            //update user's balance

                            User::where('id', $id)->update(['balance' => $bal]);

                            $package::where('id', $id)->update(['stage'=> 7]);

                        }else{
                            echo "ETM stages completed";
                        }
                    }else if($package == 'EL'){
                        if ($stage == 2){
                            //pay and promote
                            $bal = $getBalance->balance + 130000;
                            $addToHist = new Transaction();
                            $addToHist->user_id = $id;
                            $addToHist->description = 'EL stage 2 payout';
                            $addToHist->amount = 130000;
                            $addToHist->save();

                            //update user's balance

                            User::where('id', $id)->update(['balance' => $bal]);

                            $package::where('id', $id)->update(['stage'=> 3]);

                        }else if($stage == 3){
                              //pay and promote
                              $bal = $getBalance->balance + 320000;
                              $addToHist = new Transaction();
                              $addToHist->user_id = $id;
                              $addToHist->description = 'EL stage 3 payout';
                              $addToHist->amount = 320000;
                              $addToHist->save();
  
                              //update user's balance
  
                              User::where('id', $id)->update(['balance' => $bal]);
  
                              $package::where('id', $id)->update(['stage'=> 4]);

                        }else if($stage == 4){
                            //pay and promote
                            $bal = $getBalance->balance + 1000000;
                            $addToHist = new Transaction();
                            $addToHist->user_id = $id;
                            $addToHist->description = 'EL stage 4 payout';
                            $addToHist->amount = 1000000;
                            $addToHist->save();

                            //update user's balance

                            User::where('id', $id)->update(['balance' => $bal]);

                            $package::where('id', $id)->update(['stage'=> 5]);

                      }else if($stage == 5){
                        //pay and promote
                        $bal = $getBalance->balance + 2500000;
                        $addToHist = new Transaction();
                        $addToHist->user_id = $id;
                        $addToHist->description = 'EL stage 5 payout';
                        $addToHist->amount = 2500000;
                        $addToHist->save();

                        //update user's balance

                        User::where('id', $id)->update(['balance' => $bal]);

                        $package::where('id', $id)->update(['stage'=> 6]);

                  }else if($stage == 6){
                    //pay and promote
                    $bal = $getBalance->balance + 7200000;
                    $addToHist = new Transaction();
                    $addToHist->user_id = $id;
                    $addToHist->description = 'EL stage 6 payout';
                    $addToHist->amount = 7200000;
                    $addToHist->save();

                    //update user's balance

                    User::where('id', $id)->update(['balance' => $bal]);

                    $package::where('id', $id)->update(['stage'=> 7]);

                    }else if($stage == 7){
                        //pay and promote
                        $bal = $getBalance->balance + 18000000;
                        $addToHist = new Transaction();
                        $addToHist->user_id = $id;
                        $addToHist->description = 'EL stage 7 payout';
                        $addToHist->amount = 18000000;
                        $addToHist->save();

                        //update user's balance

                        User::where('id', $id)->update(['balance' => $bal]);

                        $package::where('id', $id)->update(['stage'=> 8]);

                        }else{
                            echo "No more stage in this package";
                        }
                    }else if($package == 'ED'){
                        if ($stage == 2){
                            //pay and promote
                            $bal = $getBalance->balance + 130000;
                            $addToHist = new Transaction();
                            $addToHist->user_id = $id;
                            $addToHist->description = 'ED stage 2 payout';
                            $addToHist->amount = 200000;
                            $addToHist->save();

                            //update user's balance

                            User::where('id', $id)->update(['balance' => $bal]);

                            $package::where('id', $id)->update(['stage'=> 3]);

                        }else if($stage == 3){
                              //pay and promote
                              $bal = $getBalance->balance + 500000;
                              $addToHist = new Transaction();
                              $addToHist->user_id = $id;
                              $addToHist->description = 'ED stage 3 payout';
                              $addToHist->amount = 500000;
                              $addToHist->save();
  
                              //update user's balance
  
                              User::where('id', $id)->update(['balance' => $bal]);
  
                              $package::where('id', $id)->update(['stage'=> 4]);

                        }else if($stage == 4){
                            //pay and promote
                            $bal = $getBalance->balance + 1250000;
                            $addToHist = new Transaction();
                            $addToHist->user_id = $id;
                            $addToHist->description = 'ED stage 4 payout';
                            $addToHist->amount = 1250000;
                            $addToHist->save();

                            //update user's balance

                            User::where('id', $id)->update(['balance' => $bal]);

                            $package::where('id', $id)->update(['stage'=> 5]);

                      }else if($stage == 5){
                        //pay and promote
                        $bal = $getBalance->balance + 4000000;
                        $addToHist = new Transaction();
                        $addToHist->user_id = $id;
                        $addToHist->description = 'ED stage 5 payout';
                        $addToHist->amount = 4000000;
                        $addToHist->save();

                        //update user's balance

                        User::where('id', $id)->update(['balance' => $bal]);

                        $package::where('id', $id)->update(['stage'=> 6]);

                  }else if($stage == 6){
                    //pay and promote
                    $bal = $getBalance->balance + 11500000;
                    $addToHist = new Transaction();
                    $addToHist->user_id = $id;
                    $addToHist->description = 'ED stage 6 payout';
                    $addToHist->amount = 11500000;
                    $addToHist->save();

                    //update user's balance

                    User::where('id', $id)->update(['balance' => $bal]);

                    $package::where('id', $id)->update(['stage'=> 7]);

                    }else if($stage == 7){
                        //pay and promote
                        $bal = $getBalance->balance + 30000000;
                        $addToHist = new Transaction();
                        $addToHist->user_id = $id;
                        $addToHist->description = 'ED stage 7 payout';
                        $addToHist->amount = 30000000;
                        $addToHist->save();

                        //update user's balance

                        User::where('id', $id)->update(['balance' => $bal]);

                        $package::where('id', $id)->update(['stage'=> 8]);

                        }else{
                            echo "No more stage in this package";
                        }

               }
           }

            

        }


         //check package where package is not AIBO
         $checks = User::where('Package', '!=', 'AIBO')->get();
        
         //after payment, promote to next stage and pair

         foreach ($checks as $check){

         }
     }
}
}
