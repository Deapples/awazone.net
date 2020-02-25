<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    //
    public function showProfile(){
        if((session('id')== null)){
            return redirect('/login');
        }else{
            $id = session('id');
            $user = User::where('id', $id)->get();
            
            $data = $user[0];
            return view('profile', ['data' => $data]);

        }
    }
}
