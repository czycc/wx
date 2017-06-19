<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//匡威项目
Route::post('kw/image', 'Converse\ConverseController@image');


//九牧验证码
Route::post('jomoo', 'Jomoo\JomooController@index');
Route::post('jomoo/destroy', 'Jomoo\JomooController@destroy');

//匡威统计分享次数
Route::post('converse/share', 'Converse\ConverseController@share');