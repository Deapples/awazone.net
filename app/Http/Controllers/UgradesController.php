<?php

namespace App\Http\Controllers;

use App\EL;
use App\ETM;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;

class UgradesController extends Controller
{
    //
    public function showUpgrade(){
        if((session('id')== null)){
            return redirect('/login');
        }else{
            $id = session('id');
            $user = User::where('id', $id)->get();
            $data = $user[0];
            return view('ugrade', ['data' => $data]);

        }
    }



        /**
         * @param request, view
         * return view
         */
    public function createPackage(Request $request){
        //if referral isn't on the package
        //initialize
        $id = session('id');
        $parent = $request->refer;
        $price = 0;
        $package = $request->package;

        if ($package == 'ETM'){
            //check if parent is in the package currently
            $check = User::where('username', $parent)->get();
            if(count($check)> 0){
                if($check[0]->Package == 'ETM'){
                   //check stage
                   $che = ETM::where('user_id', $check[0]->id)->where('stage', 1)->get();
                   //if parent is the package
                   if(count($che)> 0){
                       //now check position where user is parent
                       $checkPos = ETM::where('parent_id', $check[0]->id)->get();
                       if (count($checkPos) > 0){
                           //enter details
                           $save = new ETM();
                           $save->user_id = $id;
                           $save->status = 'uncleared';
                           $save->parent_id = $check[0]->id;
                           $save->root_id= $che[0]->parent_id;
                           $save->stage = 1;
                           $save->level = 2;
                           $save->position = 'right';
                           $save->save();

                           //add into transaction history
                           $newTransaction = new Transaction();
                           $newTransaction->user_id = $id;
                           $newTransaction->description = "ETM upgrade";
                           $newTransaction->amount = 100;
                           $newTransaction->save();
                           //update package
                           User::where('id', $id)->update(['Package'=> 'ETM']);
      

                       }else if(count($check)> 1){
                           //auto pair
                              // auto pair
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

                       //add into transaction history
                       $newTransaction = new Transaction();
                       $newTransaction->user_id = $id;
                       $newTransaction->description = "ETM upgrade";
                       $newTransaction->amount = 100;
                       $newTransaction->save();
                       //update package
                       User::where('id', $id)->update(['Package'=> 'ETM']);

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

                      //add into transaction history
                      $newTransaction = new Transaction();
                      $newTransaction->user_id = $id;
                      $newTransaction->description = "ETM upgrade";
                      $newTransaction->amount = 100;
                      $newTransaction->save();
                      //update package
                      User::where('id', $id)->update(['Package'=> 'ETM']);
                }
                    
                
                         

                       }else{
                        $save = new ETM();
                        $save->user_id = $id;
                        $save->status = 'uncleared';
                        $save->parent_id = $check[0]->id;
                        $save->root_id= $che[0]->parent_id;
                        $save->stage = 1;
                        $save->level = 1;
                        $save->position = 'left';

                          //add into transaction history
                          $newTransaction = new Transaction();
                          $newTransaction->user_id = $id;
                          $newTransaction->description = "ETM upgrade";
                          $newTransaction->amount = 100;
                          $newTransaction->save();
                          //update package
                          User::where('id', $id)->update(['Package'=> 'ETM']);
                       }

                   }else{
                       //auto pair
                          // auto pair
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

                       //add into transaction history
                       $newTransaction = new Transaction();
                       $newTransaction->user_id = $id;
                       $newTransaction->description = "ETM upgrade";
                       $newTransaction->amount = 100;
                       $newTransaction->save();
                       //update package
                       User::where('id', $id)->update(['Package'=> 'ETM']);

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

                      //add into transaction history
                      $newTransaction = new Transaction();
                      $newTransaction->user_id = $id;
                      $newTransaction->description = "ETM upgrade";
                      $newTransaction->amount = 100;
                      $newTransaction->save();
                      //update package
                      User::where('id', $id)->update(['Package'=> 'ETM']);
                }
                    
                   }
                }else{
                    // auto pair
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

                       //add into transaction history
                       $newTransaction = new Transaction();
                       $newTransaction->user_id = $id;
                       $newTransaction->description = "ETM upgrade";
                       $newTransaction->amount = 100;
                       $newTransaction->save();
                       //update package
                       User::where('id', $id)->update(['Package'=> 'ETM']);

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

                      //add into transaction history
                      $newTransaction = new Transaction();
                      $newTransaction->user_id = $id;
                      $newTransaction->description = "ETM upgrade";
                      $newTransaction->amount = 100;
                      $newTransaction->save();
                      //update package
                      User::where('id', $id)->update(['Package'=> 'ETM']);
                }
                    
                }
            }else{
                $msg = $parent. ' is not a registered user';
                echo "<script>alert('$msg'); window.location=('/upgrade');</script>";
            }

        }else if($package == 'EL'){
              //check if parent is in the package currently
              $check = User::where('username', $parent)->get();
              if(count($check)> 0){
                  if($check[0]->Package == 'EL'){
                     //check stage
                     $che = EL::where('user_id', $check[0]->id)->where('stage', 1)->get();
                     //if parent is the package
                     if(count($che)> 0){
                         //now check position where user is parent
                         $checkPos = EL::where('parent_id', $check[0]->id)->get();
                         if (count($checkPos) > 0){
                             //enter details
                             $save = new EL();
                             $save->user_id = $id;
                             $save->status = 'uncleared';
                             $save->parent_id = $check[0]->id;
                             $save->root_id= $che[0]->parent_id;
                             $save->stage = 1;
                             $save->level = 2;
                             $save->position = 'right';
                             $save->save();
  
                             //add into transaction history
                             $newTransaction = new Transaction();
                             $newTransaction->user_id = $id;
                             $newTransaction->description = "EL upgrade";
                             $newTransaction->amount = 200;
                             $newTransaction->save();
                             //update package
                             User::where('id', $id)->update(['Package'=> 'EL']);
        
  
                         }else if(count($check)> 1){
                             //auto pair
                                // auto pair
                      $n_parent = EL::where('status', 'uncleared')->where('level', '<', 2)->get()->first();
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
                       $save = new EL();
                       $save->user_id = $id;
                       $save->status = 'uncleared';
                       $save->parent_id = $n_parent[0]->user_id;
                       $save->root_id= $n_parent[0]->parent_id;
                       $save->stage = 1;
                       $save->level = $level;
                       $save->position = $position;
  
                         //add into transaction history
                         $newTransaction = new Transaction();
                         $newTransaction->user_id = $id;
                         $newTransaction->description = "ETM EL";
                         $newTransaction->amount = 200;
                         $newTransaction->save();
                         //update package
                         User::where('id', $id)->update(['Package'=> 'EL']);
  
                  }else{
                      //enter without parent and root
                      $save = new EL();
                      $save->user_id = $id;
                      $save->status = 'uncleared';
                      $save->parent_id = 0;
                      $save->root_id= 0;
                      $save->stage = 1;
                      $save->level = $level;
                      $save->position = $position;
  
                        //add into transaction history
                        $newTransaction = new Transaction();
                        $newTransaction->user_id = $id;
                        $newTransaction->description = "EL upgrade";
                        $newTransaction->amount = 200;
                        $newTransaction->save();
                        //update package
                        User::where('id', $id)->update(['Package'=> 'EL']);
                  }
                      
                  
                           
  
                         }else{
                          $save = new EL();
                          $save->user_id = $id;
                          $save->status = 'uncleared';
                          $save->parent_id = $check[0]->id;
                          $save->root_id= $che[0]->parent_id;
                          $save->stage = 1;
                          $save->level = 1;
                          $save->position = 'left';
  
                            //add into transaction history
                            $newTransaction = new Transaction();
                            $newTransaction->user_id = $id;
                            $newTransaction->description = "EL upgrade";
                            $newTransaction->amount = 200;
                            $newTransaction->save();
                            //update package
                            User::where('id', $id)->update(['Package'=> 'EL']);
                         }
  
                     }else{
                         //auto pair
                            // auto pair
                      $n_parent = EL::where('status', 'uncleared')->where('level', '<', 2)->get()->first();
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
                       $save = new EL();
                       $save->user_id = $id;
                       $save->status = 'uncleared';
                       $save->parent_id = $n_parent[0]->user_id;
                       $save->root_id= $n_parent[0]->parent_id;
                       $save->stage = 1;
                       $save->level = $level;
                       $save->position = $position;
  
                         //add into transaction history
                         $newTransaction = new Transaction();
                         $newTransaction->user_id = $id;
                         $newTransaction->description = "EL upgrade";
                         $newTransaction->amount = 200;
                         $newTransaction->save();
                         //update package
                         User::where('id', $id)->update(['Package'=> 'EL']);
  
                  }else{
                      //enter without parent and root
                      $save = new EL();
                      $save->user_id = $id;
                      $save->status = 'uncleared';
                      $save->parent_id = 0;
                      $save->root_id= 0;
                      $save->stage = 1;
                      $save->level = $level;
                      $save->position = $position;
  
                        //add into transaction history
                        $newTransaction = new Transaction();
                        $newTransaction->user_id = $id;
                        $newTransaction->description = "EL upgrade";
                        $newTransaction->amount = 200;
                        $newTransaction->save();
                        //update package
                        User::where('id', $id)->update(['Package'=> 'EL']);
                  }
                      
                     }
                  }else{
                      // auto pair
                      $n_parent = EL::where('status', 'uncleared')->where('level', '<', 2)->get()->first();
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
                       $save = new EL();
                       $save->user_id = $id;
                       $save->status = 'uncleared';
                       $save->parent_id = $n_parent[0]->user_id;
                       $save->root_id= $n_parent[0]->parent_id;
                       $save->stage = 1;
                       $save->level = $level;
                       $save->position = $position;
  
                         //add into transaction history
                         $newTransaction = new Transaction();
                         $newTransaction->user_id = $id;
                         $newTransaction->description = "EL upgrade";
                         $newTransaction->amount = 200;
                         $newTransaction->save();
                         //update package
                         User::where('id', $id)->update(['Package'=> 'EL']);
  
                  }else{
                      //enter without parent and root
                      $save = new EL();
                      $save->user_id = $id;
                      $save->status = 'uncleared';
                      $save->parent_id = 0;
                      $save->root_id= 0;
                      $save->stage = 1;
                      $save->level = $level;
                      $save->position = $position;
  
                        //add into transaction history
                        $newTransaction = new Transaction();
                        $newTransaction->user_id = $id;
                        $newTransaction->description = "EL upgrade";
                        $newTransaction->amount = 200;
                        $newTransaction->save();
                        //update package
                        User::where('id', $id)->update(['Package'=> 'EL']);
                  }
                      
                  }
              }else{
                  $msg = $parent. ' is not a registered user';
                  echo "<script>alert('$msg'); window.location=('/upgrade');</script>";
              }

        }else if($package == 'ED'){

        }
        
    }
}
