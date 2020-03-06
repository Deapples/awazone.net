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

     public function packagesPayment(){
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

                    $package::where('user_id', $id)->update(['stage'=> 2, 'status'=> 'cleared']);


                  }else if($package == 'EL'){
                    $bal = $getBalance->balance + 48000;
                    $addToHist = new Transaction();
                    $addToHist->user_id = $id;
                    $addToHist->description = 'EL stage 1 payout';
                    $addToHist->amount = 48000;
                    $addToHist->save();

                    //update user's balance

                    User::where('id', $id)->update(['balance' => $bal]);

                    $package::where('user_id', $id)->update(['stage'=> 2, 'status'=> 'cleared']);

                  }else if($package == 'ED'){
                    $bal = $getBalance->balance + 72000;
                    $addToHist = new Transaction();
                    $addToHist->user_id = $id;
                    $addToHist->description = 'ED stage 1 payout';
                    $addToHist->amount = 72000;
                    $addToHist->save();

                    //update user's balance

                    User::where('id', $id)->update(['balance' => $bal]);

                    $package::where('user_id', $id)->update(['stage'=> 2, 'status'=> 'cleared']);


                  }else if($package == 'RD'){
                    $bal = $getBalance->balance + 144000;
                    $addToHist = new Transaction();
                    $addToHist->user_id = $id;
                    $addToHist->description = 'RD stage 1 payout';
                    $addToHist->amount = 144000;
                    $addToHist->save();

                    //update user's balance

                    User::where('id', $id)->update(['balance' => $bal]);

                    $package::where('user_id', $id)->update(['stage'=> 2, 'status'=> 'cleared']);


                  }else if($package == 'ND'){
                    $bal = $getBalance->balance + 300000;
                    $addToHist = new Transaction();
                    $addToHist->user_id = $id;
                    $addToHist->description = 'ND stage 1 payout';
                    $addToHist->amount = 300000;
                    $addToHist->save();

                    //update user's balance

                    User::where('id', $id)->update(['balance' => $bal]);

                    $package::where('user_id', $id)->update(['stage'=> 2, 'status'=> 'cleared']);

                  }else if($package == 'RVP'){
                    $bal = $getBalance->balance + 600000;
                    $addToHist = new Transaction();
                    $addToHist->user_id = $id;
                    $addToHist->description = 'RVP stage 1 payout';
                    $addToHist->amount = 600000;
                    $addToHist->save();

                    //update user's balance

                    User::where('id', $id)->update(['balance' => $bal]);

                    $package::where('user_id', $id)->update(['stage'=> 2, 'status'=> 'cleared']);

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

                            $package::where('user_id', $id)->update(['stage'=> 3, 'status'=> 'cleared']);

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

                            $package::where('user_id', $id)->update(['stage'=> 4, 'status'=> 'cleared']);

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

                            $package::where('user_id', $id)->update(['stage'=> 5, 'status'=> 'cleared']);

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

                            $package::where('user_id', $id)->update(['stage'=> 6, 'status'=> 'cleared']);

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

                            $package::where('user_id', $id)->update(['stage'=> 7, 'status'=> 'cleared']);

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

                            $package::where('user_id', $id)->update(['stage'=> 3, 'status'=> 'cleared']);

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
  
                              $package::where('user_id', $id)->update(['stage'=> 4, 'status'=> 'cleared']);

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

                            $package::where('user_id', $id)->update(['stage'=> 5, 'status'=> 'cleared']);

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

                        $package::where('user_id', $id)->update(['stage'=> 6, 'status'=> 'cleared']);

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

                    $package::where('user_id', $id)->update(['stage'=> 7, 'status'=> 'cleared']);

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

                        $package::where('user_id', $id)->update(['stage'=> 8, 'status'=> 'cleared']);

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

                            $package::where('user_id', $id)->update(['stage'=> 3, 'status'=> 'cleared']);

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
  
                              $package::where('user_id', $id)->update(['stage'=> 4, 'status'=> 'cleared']);

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

                            $package::where('user_id', $id)->update(['stage'=> 5, 'status'=> 'cleared']);

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

                        $package::where('user_id', $id)->update(['stage'=> 6, 'status'=> 'cleared']);

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

                    $package::where('user_id', $id)->update(['stage'=> 7, 'status'=> 'cleared']);

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

                        $package::where('user_id', $id)->update(['stage'=> 8, 'status'=> 'cleared']);

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

                            $package::where('user_id', $id)->update(['stage'=> 3, 'status'=> 'cleared']);

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
  
                              $package::where('user_id', $id)->update(['stage'=> 4, 'status'=> 'cleared']);

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

                            $package::where('user_id', $id)->update(['stage'=> 5, 'status'=> 'cleared']);

                      }else if($stage == 5){
                        //pay and promote
                        $bal = $getBalance->balance + 3000000;
                        $addToHist = new Transaction();
                        $addToHist->user_id = $id;
                        $addToHist->description = 'ED stage 5 payout';
                        $addToHist->amount = 3000000;
                        $addToHist->save();

                        //update user's balance

                        User::where('id', $id)->update(['balance' => $bal]);

                        $package::where('user_id', $id)->update(['stage'=> 6, 'status'=> 'cleared']);

                  }else if($stage == 6){
                    //pay and promote
                    $bal = $getBalance->balance + 10500000;
                    $addToHist = new Transaction();
                    $addToHist->user_id = $id;
                    $addToHist->description = 'ED stage 6 payout';
                    $addToHist->amount = 10500000;
                    $addToHist->save();

                    //update user's balance

                    User::where('id', $id)->update(['balance' => $bal]);

                    $package::where('user_id', $id)->update(['stage'=> 7, 'status'=> 'cleared']);

                    }else if($stage == 7){
                        //pay and promote
                        $bal = $getBalance->balance + 25000000;
                        $addToHist = new Transaction();
                        $addToHist->user_id = $id;
                        $addToHist->description = 'ED stage 7 payout';
                        $addToHist->amount = 25000000;
                        $addToHist->save();

                        //update user's balance

                        User::where('id', $id)->update(['balance' => $bal]);

                        $package::where('user_id', $id)->update(['stage'=> 8, 'status'=> 'cleared']);

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

                            $package::where('user_id', $id)->update(['stage'=> 3, 'status'=> 'cleared']);

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
  
                              $package::where('user_id', $id)->update(['stage'=> 4, 'status'=> 'cleared']);

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

                            $package::where('user_id', $id)->update(['stage'=> 5, 'status'=> 'cleared']);

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

                        $package::where('user_id', $id)->update(['stage'=> 6, 'status'=> 'cleared']);

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

                    $package::where('user_id', $id)->update(['stage'=> 7, 'status'=> 'cleared']);

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

                        $package::where('user_id', $id)->update(['stage'=> 8, 'status'=> 'cleared']);

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

                            $package::where('user_id', $id)->update(['stage'=> 3, 'status'=> 'cleared']);

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
  
                              $package::where('user_id', $id)->update(['stage'=> 4, 'status'=> 'cleared']);

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

                            $package::where('user_id', $id)->update(['stage'=> 5, 'status'=> 'cleared']);

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

                        $package::where('user_id', $id)->update(['stage'=> 6, 'status'=> 'cleared']);

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

                    $package::where('user_id', $id)->update(['stage'=> 7, 'status'=> 'cleared']);

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

                        $package::where('user_id', $id)->update(['stage'=> 8, 'status'=> 'cleared']);

                        }else{
                            echo "No more stage in this package";
                        }

               }else if($package == 'ND'){
                        if ($stage == 2){
                            //pay and promote
                            $bal = $getBalance->balance + 400000;
                            $addToHist = new Transaction();
                            $addToHist->user_id = $id;
                            $addToHist->description = 'ND stage 2 payout';
                            $addToHist->amount = 400000;
                            $addToHist->save();

                            //update user's balance

                            User::where('id', $id)->update(['balance' => $bal]);

                            $package::where('user_id', $id)->update(['stage'=> 3, 'status'=> 'cleared']);

                        }else if($stage == 3){
                            //pay and promote
                            $bal = $getBalance->balance + 1000000;
                            $addToHist = new Transaction();
                            $addToHist->user_id = $id;
                            $addToHist->description = 'ND stage 3 payout';
                            $addToHist->amount = 1000000;
                            $addToHist->save();

                            //update user's balance

                            User::where('id', $id)->update(['balance' => $bal]);

                            $package::where('user_id', $id)->update(['stage'=> 4, 'status'=> 'cleared']);

                        }else if($stage == 4){
                            //pay and promote
                            $bal = $getBalance->balance + 2500000;
                            $addToHist = new Transaction();
                            $addToHist->user_id = $id;
                            $addToHist->description = 'ND stage 4 payout';
                            $addToHist->amount = 2500000;
                            $addToHist->save();

                            //update user's balance

                            User::where('id', $id)->update(['balance' => $bal]);

                            $package::where('user_id', $id)->update(['stage'=> 5, 'status'=> 'cleared']);

                    }else if($stage == 5){
                        //pay and promote
                        $bal = $getBalance->balance + 8000000;
                        $addToHist = new Transaction();
                        $addToHist->user_id = $id;
                        $addToHist->description = 'ND stage 5 payout';
                        $addToHist->amount = 8000000;
                        $addToHist->save();

                        //update user's balance

                        User::where('id', $id)->update(['balance' => $bal]);

                        $package::where('user_id', $id)->update(['stage'=> 6, 'status'=> 'cleared']);

                }else if($stage == 6){
                    //pay and promote
                    $bal = $getBalance->balance + 23000000;
                    $addToHist = new Transaction();
                    $addToHist->user_id = $id;
                    $addToHist->description = 'ND stage 6 payout';
                    $addToHist->amount = 23000000;
                    $addToHist->save();

                    //update user's balance

                    User::where('id', $id)->update(['balance' => $bal]);

                    $package::where('user_id', $id)->update(['stage'=> 7, 'status'=> 'cleared']);

                    }else if($stage == 7){
                        //pay and promote
                        $bal = $getBalance->balance + 60000000;
                        $addToHist = new Transaction();
                        $addToHist->user_id = $id;
                        $addToHist->description = 'ND stage 7 payout';
                        $addToHist->amount = 60000000;
                        $addToHist->save();

                        //update user's balance

                        User::where('id', $id)->update(['balance' => $bal]);

                        $package::where('user_id', $id)->update(['stage'=> 8, 'status'=> 'cleared']);

                        }else if($stage == 8){
                            //pay and promote
                        $bal = $getBalance->balance + 150000000;
                        $addToHist = new Transaction();
                        $addToHist->user_id = $id;
                        $addToHist->description = 'ND stage 8 payout';
                        $addToHist->amount = 150000000;
                        $addToHist->save();

                        //update user's balance

                        User::where('id', $id)->update(['balance' => $bal]);

                        $package::where('user_id', $id)->update(['stage'=> 9, 'status'=> 'cleared']);

                        }else{
                            echo "No more stage in this package";
                        }


       }else if($package == 'RD'){
                    if ($stage == 2){
                        //pay and promote
                        $bal = $getBalance->balance + 800000;
                        $addToHist = new Transaction();
                        $addToHist->user_id = $id;
                        $addToHist->description = 'RD stage 2 payout';
                        $addToHist->amount = 800000;
                        $addToHist->save();

                        //update user's balance

                        User::where('id', $id)->update(['balance' => $bal]);

                        $package::where('user_id', $id)->update(['stage'=> 3, 'status'=> 'cleared']);

                    }else if($stage == 3){
                        //pay and promote
                        $bal = $getBalance->balance + 1700000;
                        $addToHist = new Transaction();
                        $addToHist->user_id = $id;
                        $addToHist->description = 'RD stage 3 payout';
                        $addToHist->amount = 1700000;
                        $addToHist->save();

                        //update user's balance

                        User::where('id', $id)->update(['balance' => $bal]);

                        $package::where('user_id', $id)->update(['stage'=> 4, 'status'=> 'cleared']);

                    }else if($stage == 4){
                        //pay and promote
                        $bal = $getBalance->balance + 4500000;
                        $addToHist = new Transaction();
                        $addToHist->user_id = $id;
                        $addToHist->description = 'RD stage 4 payout';
                        $addToHist->amount = 4500000;
                        $addToHist->save();

                        //update user's balance

                        User::where('id', $id)->update(['balance' => $bal]);

                        $package::where('user_id', $id)->update(['stage'=> 5, 'status'=> 'cleared']);

                }else if($stage == 5){
                    //pay and promote
                    $bal = $getBalance->balance + 12600000;
                    $addToHist = new Transaction();
                    $addToHist->user_id = $id;
                    $addToHist->description = 'RD stage 5 payout';
                    $addToHist->amount = 12600000;
                    $addToHist->save();

                    //update user's balance

                    User::where('id', $id)->update(['balance' => $bal]);

                    $package::where('user_id', $id)->update(['stage'=> 6, 'status'=> 'cleared']);

            }else if($stage == 6){
                //pay and promote
                $bal = $getBalance->balance + 35000000;
                $addToHist = new Transaction();
                $addToHist->user_id = $id;
                $addToHist->description = 'RD stage 6 payout';
                $addToHist->amount = 35000000;
                $addToHist->save();

                //update user's balance

                User::where('id', $id)->update(['balance' => $bal]);

                $package::where('user_id', $id)->update(['stage'=> 7, 'status'=> 'cleared']);

                }else if($stage == 7){
                    //pay and promote
                    $bal = $getBalance->balance + 95000000;
                    $addToHist = new Transaction();
                    $addToHist->user_id = $id;
                    $addToHist->description = 'RD stage 7 payout';
                    $addToHist->amount = 95000000;
                    $addToHist->save();

                    //update user's balance

                    User::where('id', $id)->update(['balance' => $bal]);

                    $package::where('user_id', $id)->update(['stage'=> 8, 'status'=> 'cleared']);

                    }else if($stage == 8){
                        //pay and promote
                    $bal = $getBalance->balance + 2500000000;
                    $addToHist = new Transaction();
                    $addToHist->user_id = $id;
                    $addToHist->description = 'RD stage 8 payout';
                    $addToHist->amount = 2500000000;
                    $addToHist->save();

                    //update user's balance

                    User::where('id', $id)->update(['balance' => $bal]);

                    $package::where('user_id', $id)->update(['stage'=> 9, 'status'=> 'cleared']);

                    }else{
                        echo "No more stage in this package";
                    }

       }else if($package == 'RVP'){
        if ($stage == 2){
            //pay and promote
            $bal = $getBalance->balance + 1600000;
            $addToHist = new Transaction();
            $addToHist->user_id = $id;
            $addToHist->description = 'RVP stage 2 payout';
            $addToHist->amount = 1600000;
            $addToHist->save();

            //update user's balance

            User::where('id', $id)->update(['balance' => $bal]);

            $package::where('user_id', $id)->update(['stage'=> 3, 'status'=> 'cleared']);

        }else if($stage == 3){
            //pay and promote
            $bal = $getBalance->balance + 3200000;
            $addToHist = new Transaction();
            $addToHist->user_id = $id;
            $addToHist->description = 'RVP stage 3 payout';
            $addToHist->amount = 3200000;
            $addToHist->save();

            //update user's balance

            User::where('id', $id)->update(['balance' => $bal]);

            $package::where('user_id', $id)->update(['stage'=> 4, 'status'=> 'cleared']);

        }else if($stage == 4){
            //pay and promote
            $bal = $getBalance->balance + 9000000;
            $addToHist = new Transaction();
            $addToHist->user_id = $id;
            $addToHist->description = 'RVP stage 4 payout';
            $addToHist->amount = 9000000;
            $addToHist->save();

            //update user's balance

            User::where('id', $id)->update(['balance' => $bal]);

            $package::where('user_id', $id)->update(['stage'=> 5, 'status'=> 'cleared']);

    }else if($stage == 5){
        //pay and promote
        $bal = $getBalance->balance + 25200000;
        $addToHist = new Transaction();
        $addToHist->user_id = $id;
        $addToHist->description = 'RVP stage 5 payout';
        $addToHist->amount = 25200000;
        $addToHist->save();

        //update user's balance

        User::where('id', $id)->update(['balance' => $bal]);

        $package::where('user_id', $id)->update(['stage'=> 6, 'status'=> 'cleared']);

}else if($stage == 6){
    //pay and promote
    $bal = $getBalance->balance + 70000000;
    $addToHist = new Transaction();
    $addToHist->user_id = $id;
    $addToHist->description = 'RVP stage 6 payout';
    $addToHist->amount = 70000000;
    $addToHist->save();

    //update user's balance

    User::where('id', $id)->update(['balance' => $bal]);

    $package::where('user_id', $id)->update(['stage'=> 7, 'status'=> 'cleared']);

    }else if($stage == 7){
        //pay and promote
        $bal = $getBalance->balance + 190000000;
        $addToHist = new Transaction();
        $addToHist->user_id = $id;
        $addToHist->description = 'RVP stage 7 payout';
        $addToHist->amount = 190000000;
        $addToHist->save();

        //update user's balance

        User::where('id', $id)->update(['balance' => $bal]);

        $package::where('user_id', $id)->update(['stage'=> 8, 'status'=> 'cleared']);

        }else if($stage == 8){
            //pay and promote
        $bal = $getBalance->balance + 500000000;
        $addToHist = new Transaction();
        $addToHist->user_id = $id;
        $addToHist->description = 'RVP stage 8 payout';
        $addToHist->amount = 500000000;
        $addToHist->save();

        //update user's balance

        User::where('id', $id)->update(['balance' => $bal]);

        $package::where('user_id', $id)->update(['stage'=> 9, 'status'=> 'cleared']);

        }else if($stage == 9){
              //pay and promote
                $bal = $getBalance->balance + 1000000000;
                $addToHist = new Transaction();
                $addToHist->user_id = $id;
                $addToHist->description = 'RVP stage 9 payout';
                $addToHist->amount = 1000000000;
                $addToHist->save();

                //update user's balance

                User::where('id', $id)->update(['balance' => $bal]);

                $package::where('user_id', $id)->update(['stage'=> 10, 'status'=> 'cleared']);

        }else if($stage == 10){
              //pay and promote
        $bal = $getBalance->balance + 2500000000;
        $addToHist = new Transaction();
        $addToHist->user_id = $id;
        $addToHist->description = 'RVP stage 10 payout';
        $addToHist->amount = 2500000000;
        $addToHist->save();

        //update user's balance

        User::where('id', $id)->update(['balance' => $bal]);

        $package::where('user_id', $id)->update(['stage'=> 11, 'status'=> 'cleared']);
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
            $package = $check[0]->Package;
            $id = $check[0]->id;
            $getStage = $package::where('root_id', $id)->where('status', 'uncleared')->get();

            //call payout function
            payOut($package, $id, $getStage[0]->stage );
         }
     }
}
}
