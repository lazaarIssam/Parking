<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Information;
class InformationController extends Controller
{
    public function listInformation (){
        $informations = Information::all();
        dd($informations);
    }
}
