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
use Illuminate\Support\Facades\Redis;

Route::get('/test', function (){
   Redis::set('test', 'name', 'ex','60','nx');
   $result = Redis::get('test');
   return $result;
});

//强生安视优项目
Route::get('/asy/mobile', function () {
    return view('asy.wx');
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

Route::get('kw', function (){
    return view('converse');
});

//抽奖h5入口

Route::get('/draw',function (){
   return '这是抽奖h5入口，等待开放时间';
});