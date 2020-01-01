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
        //dd($arr_ip);
        Mapper::map($arr_ip->lat, -$arr_ip->lon);
        foreach ($parking as $key) {
            $latt = explode(',', trim($key -> geo))[0];
            $lott = explode(',', trim($key -> geo))[1];
            Mapper::marker($latt, $lott);
        }
        return view('parking', ['parking' => $parking]);
    }
    function getDistance($lat, $point2){

        $radius      = 3958;      // Earth's radius (miles)
        $pi          = 3.1415926;
        $deg_per_rad = 57.29578;  // Number of degrees/radian (for conversion)
    
        $distance = ($radius * $pi * sqrt(
                    ($lat['lat'] - $point2['lat'])
                    * ($lat['lat'] - $point2['lat'])
                    + cos($lat['lat'] / $deg_per_rad)  // Convert these to
                    * cos($point2['lat'] / $deg_per_rad)  // radians for cos()
                    * ($lat['long'] - $point2['long'])
                    * ($lat['long'] - $point2['long'])
            ) / 180);
    
        $distance = round($distance,1);
        return $distance;  // Returned using the units used for $radius.
    }
}
