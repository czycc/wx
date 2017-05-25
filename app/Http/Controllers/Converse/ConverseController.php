<?php

namespace App\Http\Controllers\Converse;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Image;

class ConverseController extends Controller
{
    public function image(Request $request)
    {
        $image = $request->image;
        $image = Image::make($image);
        return 'true';
    }
}
