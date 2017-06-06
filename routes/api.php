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

Route::post('jomoo', 'Jomoo\JomooController@index');
Route::post('jomoo/destroy', 'Jomoo\JomooController@destroy');

Route::get('converse/share', 'Converse\ConverseController@share');