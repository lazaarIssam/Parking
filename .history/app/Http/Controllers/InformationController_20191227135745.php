<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\information;
class InformationController extends Controller
{
    public function listInformation (){
        $information = Information::all();
        dd($information);
    }
}
