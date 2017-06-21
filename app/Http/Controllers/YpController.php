<?php

namespace App\Http\Controllers;

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
        $provinces = Province::pluck('province');
        return $provinces->toJson();
    }
}
