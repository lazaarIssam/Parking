<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Information;
class InformationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function listInformation (){
        $informations = Information::all();
        dd($informations);
    }
}
