<?php

namespace App\Http\Controllers;

use App\ETM;
use App\User;
use Illuminate\Http\Request;

class UgradesController extends Controller
{
    //
    public function showUpgrade(){
        if((session('id')== null)){
            return redirect('/login');
        }else{
            $id = session('id');
            $user = User::where('id', $id)->get();
            $data = $user[0];
            return view('ugrade', ['data' => $data]);

        }
    }
        /**
         * @param request, view
         * return view
         */
    public function createPackage(Request $request){
        //if referral isn't on the package
        //initialize
        $parent = $request->refer;
        $price = 0;
        $package = $request->package;

        if ($package == 'ETM'){
            //check if parent is in the package currently
            $check = User::where('username', $parent)->get();
            if(count($check)> 0){
                if($check[0]->Package == 'ETM'){
                    echo "yes";
                }else{
                    // auto pair
                    $n_parent = ETM::where('status', 'not cleared')->get()->first();
                    //check position
                    if()
                    echo "not in ETM";
                }
            }else{
                echo 'not exist';
            }

        }
        
    }
}
