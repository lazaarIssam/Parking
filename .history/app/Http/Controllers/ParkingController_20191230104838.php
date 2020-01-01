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
        Mapper::map($arr_ip->lat, $arr_ip->lon);
        foreach ($parking as $key) {
            $lat = explode(',', trim($key -> geo))[0];
            $lot = -explode(',', trim($key -> geo))[1];
            dd($lat);
            Mapper::marker($lat,$lot);
        }
        return view('parking', ['parking' => $parking]);
    }
}
