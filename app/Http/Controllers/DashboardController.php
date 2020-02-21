<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function dash(){
        if((session('id')== null)){
            return redirect('/login');
        }else{
            $id = session('id');
            $user = User::where('id', $id)->get();
            
            $data = $user[0];
            return view('dashboard', ['data' => $data]);

        }
      
    }
        
    }

