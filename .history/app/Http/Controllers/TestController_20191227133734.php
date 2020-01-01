<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function contact($name){
        echo "je suis dans la methode contact".$name;
    }
}
