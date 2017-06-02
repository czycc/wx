<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class QrcodeController extends Controller
{
    public function index($code)
    {
//        return view('qrcode', compact('code'));
        $img = Image::make(public_path('qrcodes/'.$code.'.jpg'));
        return $img->resize(640,640)->response('jpg');
    }
}