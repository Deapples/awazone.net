<?php

namespace App\Http\Controllers;

use App\Transaction;
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

            //get transactions

            $getTransact = Transaction::where('user_id', $id)->get();

            if(count($getTransact) >0){
                $transactions = $getTransact[0];
            }else{
                $transactions = [];
            }
            

            $data = $user[0];
            return view('transactions', ['data' => $data, 'transactions' => $transactions]);

        }
    }
}
