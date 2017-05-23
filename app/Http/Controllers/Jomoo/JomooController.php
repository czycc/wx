<?php

namespace App\Http\Controllers\Jomoo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class JomooController extends Controller
{
    public function index(Request $request)
    {
        $code = $request->code;
        if ($code == 1111){
            return 'true';
        }
        return 'false';
    }
}
