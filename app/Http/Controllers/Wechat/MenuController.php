<?php

namespace App\Http\Controllers\Wechat;

use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public $menu;

    /**
     * MenuController constructor.
     * @param $menu
     */
    public function __construct(Application $app)
    {
        $this->menu = $app->menu;
    }

    public function menu()
    {
        $buttons = [
            [
                "name" => "关于九牧",
                "sub_button" => [
                    [
                        "type" => "click",
                        "name" => "走进九牧",
                        "key" => "menu_01"
                    ],
                    [
                        "type" => "click",
                        "name" => "九牧厨柜",
                        "key" => "menu_02"
                    ],
                    [
                        "type" => "view",
                        "name" => "企业动态",
                        "url" => "http://mp.weixin.qq.com/s?__biz=MzAwNzk1ODEzNw==&mid=100000013&idx=1&sn=c63f4f404fe449bb1d9fe68ae2375758&scene=18#wechat_redirect"
                    ],
                ],
            ],
            [
                "name" => "招商加盟",
                "sub_button" => [
                    [
                        "type" => "view",
                        "name" => "招商政策",
                        "url" => "http://mp.weixin.qq.com/s?__biz=MzAwNzk1ODEzNw==&mid=100000035&idx=1&sn=df66f22cbfc32101affc4f98e5cdc6f9&scene=18#wechat_redirect"
                    ],
                    [
                        "type" => "click",
                        "name" => "一键招商",
                        "key" => "menu_03"
                    ]
                ],
            ],
            [
                "name" => "产品系列",
                "sub_button" => [
                    [
                        "type" => "view",
                        "name" => "明星范",
                        "url" => "http://www.jomoocg.com/index.php?s=/Chanpzx/productdetail/id/70"
                    ],
                    [
                        "type" => "view",
                        "name" => "精品集",
                        "url" => "http://www.jomoocg.com/index.php?s=/Chanpzx/productdetail/id/77/pid/71"
                    ],
                    [
                        "type" => "view",
                        "name" => "宠爱系",
                        "url" => "http://www.jomoocg.com/index.php?s=/Chanpzx/productdetail/id/72"
                    ],
                ],
            ],
        ];
        $this->menu->add($buttons);
    }
}
