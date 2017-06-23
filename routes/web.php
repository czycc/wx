<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use SoapBox\Formatter\Formatter;


//强生安视优项目
Route::group(['prefix' => 'asy', 'middleware' => 'web'], function () {
    Route::get('/mobile', function () {
        return view('asy.begin');
    });
    Route::get('/one', function () {
        return view('asy.one');
    });
    Route::get('/seven', function () {
        return view('asy.seven');
    });
    Route::get('/fourteen', function () {
        return view('asy.fourteen');
    });
    Route::get('/end', function () {
        return view('asy.end');
    });
    Route::get('/n', function () {
        return view('asy.n');
    });
    Route::get('/reset', function (){
        return view('asy.reset');
    });
});
Route::get('/asy/mobile', function () {
    return view('asy.begin');
});
Route::get('/asy/pc', function () {
    return view('asy.pc');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//九牧扫码进入游戏
Route::any('/wechat', 'Wechat\WechatController@serve');
Route::get('/wechat/menu', 'Wechat\MenuController@menu');
Route::get('/wechat/material', 'Wechat\MaterialController@index');
//已经生成参加游戏二维码
//Route::get('wechat/qrcode', function (){
//    $wechat =app('wechat');
//    $qrcode = $wechat->qrcode;
//    $result = $qrcode->forever(999);
//    return view('home',compact('qrcode', 'result'));
//});


//匡威入口

Route::group(['prefix' => 'kw', 'middleware' => ['web','wechat.oauth:snsapi_base']], function () {
    Route::get('/', function () {
        $js = WeChat::js();
        return view('converse.index', compact('js'));
    });
    Route::get('/cool', function () {
        $js = WeChat::js();
        return view('converse.cool', compact('js'));
    });
    Route::post('/cool/poster', 'Converse\ConverseController@cool');

    Route::get('/hot', function () {
        $js = WeChat::js();
        return view('converse.hot', compact('js'));
    });

    Route::post('/hot/poster', 'Converse\ConverseController@hot');

    Route::get('/rule', function () {
        $js = WeChat::js();
        return view('converse.rule', compact('js'));
    });
});
Route::get('kw/select', function () {
    $js = WeChat::js();
    return view('converse.select', compact('js'));
});

//数梦工厂签到活动，已结束
//Route::get('qrcode/{code}', 'QrcodeController@index');

//一品皇家项目
Route::group(['prefix' => 'draw'], function (){
    //一品皇家抽奖h5入口
    Route::get('/', 'YpController@index');
    //更改二维码状态
    Route::post('/qrcode', 'YpController@qrcode');
    //新注册用户参与复购礼
    Route::get('/new', function (){
        return view('yp.new');
    });
});
Route::get('test1', function (){
    return view('yp.accept_err');
});
Route::get('test0', function (){
    $url = 'http://tt.wedochina.cn/API/CampaignGiftWechatService.asmx?op=GetCommonQrcode';
    $post_data ='<?xml version="1.0" encoding="utf-8"?>
<soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
  <soap12:Header>
    <CampaignGiftSoapHeader xmlns="http://tempuri.org/">
      <uid>3073</uid>
      <pwd>E10ADC3949BA59ABBE56E057F20F883E</pwd>
    </CampaignGiftSoapHeader>
  </soap12:Header>
  <soap12:Body>
    <GetCommonQrcode xmlns="http://tempuri.org/">
      <qrcode_data>{"campaigncode":"GiftYPHJ","giftcode":"YPHJ01","customermobile":"13916594483","openid":"o4MeYjgami4X0SVPpmBfMa5zINjg","location":"爱婴室上海真光路店"}</qrcode_data>
    </GetCommonQrcode>
  </soap12:Body>
</soap12:Envelope>';
//    $postdata = http_build_query($post_data);
    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => 'Content-Type:text/xml',
            'content' => $post_data,
            'timeout' => 15 * 60 // 超时时间（单位:s）
        )
    );
    $context = stream_context_create($options);
    $res = file_get_contents($url, false, $context);
    $string = $res;
    $string = str_ireplace('soap:','',$string);
    $formatter = Formatter::make($string, Formatter::XML);
    $xml = $formatter->toArray();
    $json= $xml['Body']['GetCommonQrcodeResponse']['GetCommonQrcodeResult'];
    $json = Formatter::make($json, Formatter::JSON);
    $arr = $json->toArray();
    return $arr['code'];
});