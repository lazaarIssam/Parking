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
        return view('parking', ['parking' => $parking]);
    }

    public function makingMap(){
        Mapper::map(
            53.3,
            -1.4,
            [
                'zoom' => 16,
                'dragable' => true,
            ]
        );
    }

}
