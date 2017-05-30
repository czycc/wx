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

Route::get('/test', function () {

});

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

Route::group(['prefix' => 'kw', 'middleware' => ['web', 'wechat.oauth:snsapi_base']], function () {
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

//抽奖h5入口

Route::get('/draw', function () {
    return '这是抽奖h5入口，等待开放时间';
});