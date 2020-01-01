<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mapper;
use App\Parking;

class ParkingController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function listAllParking(){
        $parking = Parking::all();
        //dd($parking);
        Mapper::map(53.381128999999990000, -1.470085000000040000);
        return view('parking', ['parking' => $parking]);
    }

    public function makingMap(){
        
        return view('parking');
    }

}
