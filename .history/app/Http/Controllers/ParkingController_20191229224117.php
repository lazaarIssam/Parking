<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mapper;
use GeoIP;
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
        // $arr_ip = geoip()->getLocation($_SERVER['REMOTE_ADDR']);
        $arr_ip = geoip()->getLocation('46.193.64.62');
        dd($arr_ip->lat);
        //Mapper::map(53.381128999999990000, -1.470085000000040000);
        //return view('parking', ['parking' => $parking]);
    }
}
