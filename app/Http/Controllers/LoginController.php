<?php

namespace App\Http\Controllers;

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
}
