<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parking;

class ParkingController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function listAllParking($request){
        $parking = Parking::all();
        //dd($parking);
        return $parking.json();
    }
}
