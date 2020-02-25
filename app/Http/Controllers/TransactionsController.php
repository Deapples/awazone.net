<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    //
    public function showTransactions(){
        if((session('id')== null)){
            return redirect('/login');
        }else{
            $id = session('id');
            $user = User::where('id', $id)->get();
            
            $data = $user[0];
            return view('transactions', ['data' => $data]);

        }
    }
}
