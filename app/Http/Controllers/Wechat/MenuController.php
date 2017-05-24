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
     * @param $app
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
                        "type" => "view",
                        "name" => "走进九牧",
                        "url" => "http://www.jomoocg.com/index.php?s=/Index/blurb/"
                    ],
                    [
                        "type" => "view",
                        "name" => "九牧厨柜",
                        "url" => "http://www.jomoocg.com/index.php?s=/Index"
                    ],
                    [
                        "type" => "view",
                        "name" => "阿九牧哥",
                        "url" => "http://mp.weixin.qq.com/mp/homepage?__biz=MzAwNzk1ODEzNw==&hid=4&sn=8134cab4e62bb5e09e512f48f41bb370#wechat_redirect"
                    ],
                ],
            ],
            [
                "name" => "招商加盟",
                "sub_button" => [
                    [
                        "type" => "view",
                        "name" => "招商政策",
                        "url" => "http://www.jomoocg.com/index.php?s=/Jion/"
                    ],
                    [
                        "type" => "view",
                        "name" => "一键加盟",
                        "url" => "http://www.jomoocg.com/index.php?s=/Jion/jmsq/id/59"
                    ],
                    [
                        "type" => "view",
                        "name" => "企业动态",
                        "url" => "http://mp.weixin.qq.com/mp/homepage?__biz=MzAwNzk1ODEzNw==&hid=3&sn=afec944876b3f492e8f11926e840104b#wechat_redirect"
                    ],
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
