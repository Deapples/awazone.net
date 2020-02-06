<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Redirect home to awazone.net homepage
    */

    public function home(){

        return redirect('https://awazone.net');
    }
}
