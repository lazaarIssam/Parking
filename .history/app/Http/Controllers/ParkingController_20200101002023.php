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
    // Calcule distance
    public static function getDistance($latC, $lotC,$lat,$lot){
        $parking = Parking::all();
        $radius      = 3958;      // Earth's radius (miles)
        $pi          = 3.1415926;
        $deg_per_rad = 57.29578;  // Number of degrees/radian (for conversion)
            $distance = ($radius * $pi * sqrt(
                    ($latC - $lat)
                    * ($latC - $lat)
                    + cos($latC / $deg_per_rad)  // Convert these to
                    * cos($lat / $deg_per_rad)  // radians for cos()
                    * ($lotC - $lot)
                    * ($lotC - $lot)) / 180);
        $distance = round($distance,1);
    // Returned using the units used for $radius.
    return $distance;
    }
    
    public static function pTPDistance($lat1, $lon1, $lat2, $lon2) { 
        $theta = $lon1 - $lon2; 
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)); 
        $dist = acos($dist); 
        $dist = rad2deg($dist); 
        $miles = $dist * 60 * 1.1515;
        return $miles * 1.609344;
    }

    public function listAllParking(){
        ini_set('max_execution_time', 300);
        $parking = Parking::all();
        //dd($parking);
        // $arr_ip = geoip()->getLocation($_SERVER['REMOTE_ADDR']);
        $arr_ip = geoip()->getLocation('46.193.64.62');
        //dd($arr_ip);
        Mapper::map($arr_ip->lat, -$arr_ip->lon);
        foreach ($parking as $key) {
            $latt = explode(',', trim($key -> geo))[0];
            $lott = explode(',', trim($key -> geo))[1];
            //ParkingController::getDistance($arr_ip->lat,$arr_ip->lon,$latt,$lott);
            pTPDistance()
            Mapper::marker($latt, $lott);
        }
        return view('parking', ['parking' => $parking]);
    }
}
