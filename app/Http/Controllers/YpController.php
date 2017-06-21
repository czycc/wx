<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Location;
use App\Models\Province;
use Illuminate\Http\Request;

class YpController extends Controller
{
    public function index(Request $request)
    {

    }

    public function qrcode(Request $request)
    {

    }

    public function location(Request $request)
    {
        if ($request->type == 'province'){
            $provinces = Province::where('status','1')->pluck('province');
            return $provinces->toJson();
        }elseif ($request->type == 'city'){
            $province = Province::where('province', $request->value)->first();
            $cities = City::where('status','1')
                ->where('province_id', $province->id)
                ->pluck('city');
            return $cities->toJson();
        }elseif ($request->type == 'location'){
            $city = City::where('city', $request->value)->first();
            $locations = Location::where('status', '1')
                ->where('city_id', $city->id)
                ->pluck('locaiton');
            return $locations->toJson();
        }
    }

    public function verify(Request $request)
    {
        $location = Location::where('location', $request->location)->first();
        if ($location->verify == $request->verify){
            return 'true';
        }else {
            return 'false';
        }
    }
}
