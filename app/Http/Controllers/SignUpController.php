<?php

namespace App\Http\Controllers;

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
        $captcha = $request->captcha;

        $check_email = User::where('email', $email)
                        ->get();
        
        $check_username = User::where('email', $username)
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
       
            $msg = 'Email already Exist';
            return view('signup', ['msg' => $msg]);
        }else if(count($check_username) > 0){
            $msg = 'Username already Exist';
            return view('signup', ['msg' => $msg]);
        }else{
            /**
             * make payment of 10,500 to printmoney
             */
            //make api call here

            //if payment is made successfully persist data
           
            //hash password

            $hashed = password_hash($password, PASSWORD_DEFAULT);
            //get referral
            
            if (($request->referral) == ' '){

                $refer = 'Awazone';
            }else{
                $refer = $request->referral;
            }
            $user = new User;

            
            $user->name = $request->fullname;
            $user->email = $request->email;
            $user->username = $request->username;
            $user->referral = $refer;
            $user->phone_number = $request->phone_number;
            
            $user->balance = 10500;
            
            $user->password = $hashed;


            $saved = $user->save();

            if($saved){
            //send email to user

            //send message
            return redirect('/login');
        }else{
            //else
            $msg ="Payment not Successful";
            $data = User::findOrFail($username);

            return view('signup', ['msg' => $msg, 'data' => $data]);
    }
        }
    }
}
