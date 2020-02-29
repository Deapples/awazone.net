<?php

namespace App\Http\Controllers;

use App\Transaction;
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

    public function withdrawFunds(Request $request){

        $p_email = $request->p_email;
        $p_password = $request->p_password;
        $amount = $request->amount * 350;

        //make api call
        //make api call here
        $dat = [
            'p_email' => $p_email,
            'amount' => $amount,
            'p_password' => $p_password
        ];              
        $url = 'http://api.printmoney.com/withdraw';

        $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $dat);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $makePayment = curl_exec($curl);
        
        $payment = json_decode($makePayment);

        if( $payment->status == 'ok'){
            //enter transaction history here
            $id = session('id');
            $trans = new Transaction();
            $trans->user_id = $id;
            $trans->description = $amount . "Withdrawal into printmoney";
            echo "<script>alert('Payment Successfully made into your printmoney Account'); window.location=('/withdraw');</script>";
        }else{
            echo "<script>alert('Payment Payment cannot be made at the moment'); window.location=('/withdraw');</script>";

        }

    }
}
