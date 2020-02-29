<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class withdrawEarningsController extends Controller
{
    //
    /**
     * @param request
     * return view
     */
    public function showWithdraw(){
        if((session('id')== null)){
            return redirect('/login');
        }else{
            $id = session('id');
            $user = User::where('id', $id)->get();
            
            $data = $user[0];
            return view('withdraw', ['data' => $data]);

        }
    }


    /**
     * @param request => email, password, amount
     * return view
     */

    public function withdrawFunds(){
        
    }
}
