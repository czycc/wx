<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use EasyWeChat\Message\Image;

class WechatController extends Controller
{

    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function serve()
    {

        $wechat = app('wechat');
        $wechat->server->setMessageHandler(function($message){
            switch ($message->MsgType) {
                case 'event':
                    if ($message->Event == 'subscribe') {

                    }
                    $str = '指缝太宽,时光太瘦
                    机智的你、终于来了！[鼓掌]
                    什么？不太熟？
                    没关系，点击右下角菜单栏分分钟建立友谊城堡
                    作为一名热情的小伙伴、现在只要告诉我你喜欢的厨房style，牧牧会为你量身打造哟～';
                    return $str;
                    break;
                case 'text':
                    if ($message->Content == '启初礼品申领') {

                    }
                    return '回复关键字"启初礼品申领"领取礼品二维码。';
                    break;
                case 'image':
                    return '收到图片消息';
                    break;
                case 'voice':
                    return '收到语音消息';
                    break;
                case 'video':
                    return '收到视频消息';
                    break;
                case 'location':
                    return '收到坐标消息';
                    break;
                case 'link':
                    return '收到链接消息';
                    break;
                // ... 其它消息
                default:
                    return '收到其它消息';
                    break;
            }
        });

        // Log::info('return response.');

        return $wechat->server->serve();
    }
}
