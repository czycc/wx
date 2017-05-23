<?php

namespace App\Http\Controllers\Wechat;

use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MaterialController extends Controller
{
    public $material;

    /**
     * MaterialController constructor.
     * @param $material
     */
    public function __construct(Application $material)
    {
        $this->material = $material->material;
    }

    public function index()
    {
        $lists = $this->material->lists('news', 0, 20);
        return $lists;
    }
}
