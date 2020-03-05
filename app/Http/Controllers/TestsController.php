<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestsController extends Controller
{
    //
    /**
     * @return test
     * 
     */

    public function sayHello(){
        function sayHelo($name, $names="no name"){ echo $name. " Says Hello to ". $names ;}
 
         sayHelo('Ezeko', 'Ella');
     }
 
     
 
}
