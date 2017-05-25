<?php

namespace App\Http\Controllers\Converse;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\File;

class ConverseController extends Controller
{
    public function image(Request $request)
    {
        $image = $request->image;
        $image = Image::make($image);
        $image->save(public_path('converse/upload/1.jpg'));
        $img_path = Storage::disk('public')->putFile('converse/upload', new File(public_path('converse/upload/1.jpg')));
        $qrcode = QrCode::format('png')->margin(0)->size(40)->generate(env('APP_URL').'/'.$img_path);
        $image2 = Image::make($qrcode);
        $image = Image::make($img_path)->insert($image2,'bottom-left','20','25');
        $image->save($img_path);
        return env('APP_URL').'/'.$img_path;
    }
}
