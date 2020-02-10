<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Make anything related to login here
     * First the frontend page and then the verification
     */

     public function login_page(){
         return view('signin');
     }

     public function login(Request $request){
        $user = $request->user;
        $password = $request->password;
        //check password
        //first check parameter
        $check = User::where('username', $user)
                 ->orWhere('email', $user)
                 ->get();
        //check captcha
        /*if ($request->captcha != 'checked'){
            $msg ="Captcha must be checked";

            return view('signin', ['message' => $msg]);
        }*/
        
        if(count($check) > 0){
            //check passsword
         if(password_verify($password, $check[0]->password)){
             //create session and login
             $session_id = session('id', $check[0]->id);
             return view('dashboard', ['session_id' => $session_id]);

            }else{//password incorrect
                $msg ="Password does not match for this User";

            return view('signin', ['message' => $msg]);
            }
        }else{//not a user
            $msg ="$user not a Registered User";

            return view('signin', ['message' => $msg]);
        }

     }
}
