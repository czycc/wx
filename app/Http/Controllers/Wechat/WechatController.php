<?php

namespace App\Http\Controllers\Wechat;

use EasyWeChat\Message\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use EasyWeChat\Message\Image;
use EasyWeChat\Message\Material;
use EasyWeChat\Message\Article;
use Illuminate\Support\Facades\Redis;

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
        $wechat->server->setMessageHandler(function ($message) use ($wechat) {
            switch ($message->MsgType) {
                case 'event':
                    switch ($message->Event) {
                        case 'subscribe':
                            //扫码
                            if (isset($message->EventKey) && $message->EventKey == 'qrscene_999'){
                                $code = mt_rand('1000','9999');
                                $bool=Redis::set('code1', $code,'ex','60','nx');
                                if ($bool=='OK'){
                                    return '九牧厨柜邀您体验智慧厨房！
请在游戏界面输入代码“<b color="red">'.$code.'</b>”，开始游戏。
';
                                }else{
                                    $bool=Redis::set('code2', $code,'ex','60','nx');
                                    if ($bool=='OK'){
                                        return '九牧厨柜邀您体验智慧厨房！
请在游戏界面输入代码“'.$code.'”，开始游戏。

分享游戏视频，精美礼品等你拿：
拍摄游戏小视频 -> 分享至朋友圈 -> 前台领取礼品';
                                    }else{
                                        $bool=Redis::set('code3', $code,'ex','60','nx');
                                        if ($bool=='OK'){
                                            return '九牧厨柜邀您体验智慧厨房！
请在游戏界面输入代码“'.$code.'”，开始游戏。

分享游戏视频，精美礼品等你拿：
拍摄游戏小视频 -> 分享至朋友圈 -> 前台领取礼品';
                                        }else{
                                            return '很遗憾，当前已经有用户正在游戏中，请稍后再试[玫瑰]';
                                        }
                                    }
                                }
                            }
                            //正常关注回复
                            $str = '指缝太宽,时光太瘦
机智的你、终于来了！[鼓掌]
什么？不太熟？
没关系，点击右下角菜单栏分分钟建立友谊城堡
作为一名热情的小伙伴、现在只要告诉我你喜欢的厨房style，牧牧会为你量身打造哟～';
                            return $str;
                            break;
                        case 'CLICK':
                            if ($message->EventKey == 'menu_01') {
                                $msg = new Material('mpnews','AlsuxGHbgkOpWWlLaxtJzWQw5oW1EWtvSVyPK_7dfFE');
                                $openid = $message->FromUserName;
                                $wechat->staff->message($msg)->to($openid)->send();
                            } elseif ($message->EventKey == 'menu_02') {
                                $msg = new Material('mpnews','AlsuxGHbgkOpWWlLaxtJzfHheoSTZTp4WdMGcFuz5yI');
                                $openid = $message->FromUserName;
                                $wechat->staff->message($msg)->to($openid)->send();
                            } else {
                                return '您好！九牧厨柜诚邀您共同开启财富之门！九牧厨柜招商热线：0592-2677770九牧厨柜期待您的加入！';
                            }
                            break;
                        case 'SCAN':
                            if ($message->EventKey == '999'){
                                $code = mt_rand('1000','9999');
                                $bool=Redis::set('code1', $code,'ex','60','nx');
                                if ($bool=='OK'){
                                    return '九牧厨柜邀您体验智慧厨房！
请在游戏界面输入代码“'.$code.'”，开始游戏。

分享游戏视频，精美礼品等你拿：
拍摄游戏小视频 -> 分享至朋友圈 -> 前台领取礼品';
                                }else{
                                    $bool=Redis::set('code2', $code,'ex','60','nx');
                                    if ($bool=='OK'){
                                        return '九牧厨柜邀您体验智慧厨房！
请在游戏界面输入代码“'.$code.'”，开始游戏。

分享游戏视频，精美礼品等你拿：
拍摄游戏小视频 -> 分享至朋友圈 -> 前台领取礼品';
                                    }else{
                                        $bool=Redis::set('code3', $code,'ex','60','nx');
                                        if ($bool=='OK'){
                                            return '九牧厨柜邀您体验智慧厨房！
请在游戏界面输入代码“'.$code.'”，开始游戏。

分享游戏视频，精美礼品等你拿：
拍摄游戏小视频 -> 分享至朋友圈 -> 前台领取礼品';
                                        }else{
                                            return '很遗憾，当前已经有用户正在游戏中，请稍后再试[玫瑰]';
                                        }
                                    }
                                }
                            }
                            break;

                    }
                    break;
                case 'text':
                    if ($message->Content == '招商' || $message->Content =='加盟' || $message->content == '招商、加盟') {
                        return 'http://www.jomoocg.com/index.php?s=/Jion/jmsq/id/59';
                    }
                    return '收到关键字';
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
