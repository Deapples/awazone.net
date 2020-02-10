<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nepster\Matrix\Matrix;
use Nepster\Matrix\Coord;
include '../vendor/autoload.php';

class MatricesController extends Controller
{
    //
    function makeMatrix(){
        
    $matrix = new Matrix(1, 2);
    $message = "fine fine";
    $data = ['name' => 'Superman',
    'avatar' => 'images/avatar-superman.jpg',];

    $matrix->addTenant(null, function($data) {
        // return your user data
        return($data);
    });
    $matrix->addTenant(null, function($data) {
        // return your user data
        return($data);
    });
    
    $matrix->addTenant(null, function($data) {
        // return your user data
        return($data);
    });
    /*$matrix->addTenant(new Coord(1, 1), function($data) {
        // return your user data
        return($data);
    });

    $matrix->addTenant(new Coord(1, 2), function($data) {
        // return your user data
        return($data);
    });*/
    
    
    $matrix->hasTenant(new Coord(0, 0));
  
   
    
    $matrix->removeTenant(new Coord(1, 1));
    

    return(['status' => 'success',
    'status_code' => 200,
    'message' => $message,
    'data' => $matrix->toArray()]);
    }
}
