<?php

namespace App\Http\Controllers;

use App\Pair;
use App\User;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;

class SignUpController extends Controller
{
    //
    public function page(){
        return view('signup');
    }




    /**
     * Send Form data
     * Process it
     * Persist data 
     */
    public function signup(Request $request){
        $email = $request->email;
        $username = $request->username;
        $password = $request->password;
        $password2 = $request->password2;
        $phone_number = $request->phone_number;
        $captcha = $request->captcha;

        $check_email = User::where('email', $email)
                        ->get();
        
        $check_username = User::where('username', $username)
                            ->get();
        $check_phone = User::where('phone_number', $phone_number)
        ->get();
        
       /* //if captcha not checked then reject 
        if($captcha !== 'checked'){
            $msg ="Captcha must be used";
            //$data = new AuthUser();
            $referral = $request->referral;
            $data = $request;

            return view('signup', ['msg' => $msg, 'data' => $data, 'referral' => $referral]);
        }*/

        //check passwords
        if($password !== $password2){

            $msg ="Password does not match";
            //$data = new AuthUser();
           
            $data = $request;

            return view('signup', ['msg' => $msg, 'data' => $data]);

        }else  if (count($check_email) > 0 ){
        //if email already exist in the database reject user
             $data = $request;

            $msg = 'Email already Exist';
            return view('signup', ['msg' => $msg, 'data' => $data]);
        }else  if (count($check_phone) > 0 ){
            //if email already exist in the database reject user


            $data = $request;

        
            $msg = 'Phone number already Exist';
            return view('signup', ['msg' => $msg, 'data' => $data]);
        }else if(count($check_username) > 0){
            $data = $request;

            $msg = 'Username already Exist';
            return view('signup', ['msg' => $msg, 'data' => $data]);
        }else{
            /**
             * make payment of 10,500 to printmoney
             */
            //make api call here

            //if payment is made successfully persist data
           
            //hash password

            $hashed = password_hash($password, PASSWORD_DEFAULT);
            //get referral
            
            if (($request->referral) == ""){

                $refer = 'Awazone';
            }else{
                $refer = $request->referral;
            }

            //pay referral bonus
            $pay = User::where('username', $refer)
                        ->get();
            $bonus = $pay[0]->referral_bonus + 500;

           User::where('username', $refer)
                ->update(['referral_bonus'=> $bonus]);
            //if(!($pay)){
                
           // }

            //save user
            $user = new User;

            
            $user->name = $request->fullname;
            $user->email = $request->email;
            $user->username = $request->username;
            $user->referral = $refer;
            $user->phone_number = $request->phone_number;
            $user->referral_bonus = 0;
            $user->match_bonus = 0;
            $user->balance = 0;
            $user->password = $hashed;
            $saved = $user->save();

            if($saved){

        
                        //user id
                $usr = User::where('username', $username)
                ->get();
                $user_id = $usr[0]->id;
                

                    // pair user
                $parent = User::where('username',$refer)->get();
                $parent_id = $parent[0]->id;

                $root = User::where('username', $parent[0]->referral)->get();
                $root_id = $root[0]->id;

                //check or the number of referrals
                $check = User::where('referral', $refer)->get();
                $refered = count($check);

                if($refered < 2){

                    //if referred 2 users update level to 1
                //get position
                
                $pos = Pair::where('parent_id', '=', $parent_id)->get()->last();

                if($pos->position == 'left'){

                    $position = 'right';

                }else if($pos->position == "right"){
                    $position = 'float';
                }else{
                    $position = 'left';
                }
            }else{
                //auto pair user
                //check database for the first person without referral
            }
                

                $pair = new Pair();
                $pair->user_id = $user_id;
                $pair->referral = $refer;
                $pair->parent_id = $parent_id;
                $pair->root_id = $root_id;
                $pair->position = $position;
                $pair->stage = 1;
                $pair->level = 0;
                $pair->save();     
                //send email to user

                //send message
                return redirect('/login');
                }else{
            //else
            $msg ="Payment not Successful";
            $data = $request;

            return view('signup', ['msg' => $msg, 'data' => $data]);
    }
        }
    }
}
