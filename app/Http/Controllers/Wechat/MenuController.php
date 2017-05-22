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
    public function __construct(Application $menu)
    {
        $this->menu = $menu;
    }

    public function menu()
    {
        $buttons = [
            [
                "name" => "关于九牧",
                "sub_button" => [
                    [
                        "type" => "view",
                        "name" => "育儿大客厅",
                        "url" => "http://qichu-crm.carnivo.cn/baby.aspx"
                    ],
                    [
                        "type" => "view",
                        "name" => "经验阅读室",
                        "url" => "http://qichu-crm.carnivo.cn/exp.aspx"
                    ],
                    [
                        "type" => "view",
                        "name" => "启初明星单品",
                        "url" => "http://www.givingforbaby.com/m/"
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
                        "url" => "menu_00"
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
