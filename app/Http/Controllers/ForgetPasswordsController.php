<?php

namespace App\Http\Controllers;

use App\Mail\SendMailable;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ForgetPasswordsController extends Controller
{
    //
    /**
     * @return forget.blade.php
     */

    public function forgetPassword(){
        return view('forget');
    }

    public function resetPassword(Request $request){
        //check if the email is registered
        //check if captcha is used
        //send email
        $newPassword = 'password';
        $hashPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $email = $request->email;
        //update users table
        $updated = User::where('email', $email)->update(['password'=> $hashPassword]);
        if($updated){
            //send email
            Mail::to($email)->send(new SendMailable($email, $newPassword));
        }else{
            $msg = 'Password change was not successful, please try again';

            echo "<script>alert('$msg');</script> window.location = ('/forgetpassword')";
        }
    }
}
