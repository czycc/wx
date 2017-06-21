<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Yp_user;
use Illuminate\Http\Request;

class YpController extends Controller
{
    public function index(Request $request)
    {

    }

    public function qrcode(Request $request)
    {
        $qrcode = Yp_user::where('openid', $request->openid)
            ->where('customermobile', $request->customermobile)
            ->first();
        if ($qrcode != null){
            $qrcode->status = 1;
            $qrcode->save();
            return response()
                ->json(['code' => 1,'desc' => 'success']);
        }else{
            return response()
                ->json(['code' => 0,'desc' => '未找到指定记录']);
        }
    }

    public function location(Request $request)
    {
        if ($request->type == 'province'){
            $provinces = Location::unique('province')->pluck('province');
            return $provinces->toJson();
        }elseif ($request->type == 'city'){
            $cities = Location::where('province', $request->value)
                ->pluck('city')
                ->unique();
            return $cities->toJson();
        }elseif ($request->type == 'location'){
            $locations = Location::where('city', $request->value)
                ->pluck('location')
                ->unique();
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
