<?php

namespace App\Http\Controllers;

use App\Events\QrcodeVerify;
use App\Models\Location;
use App\Models\Prize;
use App\Models\Yp_user;
use Carbon\Carbon;
use Illuminate\Http\Request;
use SoapBox\Formatter\Formatter;


class YpController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     * 入口页面
     */
    public function index(Request $request)
    {
        $this->validate($request, [
            'openid' => 'required',
            'location' => 'required',
            'customermobile' => 'required',
            'customercode' => 'required'
        ]);
        $customermobile = $request->customermobile;
        $openid = $request->openid;
        $location = $request->location;

        //判断两天内用户的中奖码是否核销
        $user = Yp_user::where('openid', $openid)
            ->where('status', '0')
            ->where('created_at', '>', Carbon::now()->subDays(2))
            ->first();
        if ($user != null) {
            $qrcode_url = $user->qrcode_url;
            $prize = $user->prize;
            return view('yp.accept', compact('qrcode_url', 'prize', 'openid'));
        }

        switch ($request->customercode) {
            case 0 :
                //新注册用户
                //抽奖
                $prize = $this->draw($location);//获取01234
                //当奖品领完,显示奖品领完页面
                if ($prize == 4){
                    return view('yp.accept_err');
                }
                $result = $this->qrcode_url($openid,$customermobile,$prize,$location);//获取抽奖二维码
//                if ($result['code'] !== 0){
//                    return '很抱歉，接口出现错误，请联系管理员';
//                }
                $new= new Yp_user;
                $new->openid = $openid;
                $new->location= $location;
                $new->customermobile = $customermobile;
                $new->prize = $prize;
                $new->qrcode_url = $result['data'];
                $new->save();

                $qrcode_url= $result['data'];

                return view('yp.lottery', compact('prize', 'qrcode_url', 'openid'));
                break;
            case 1 :
                //新客
                return view('yp.xk');
                break;
            case 2 :
                //复购用户
                return view('yp.fg');
                break;
            default :
                return '您的身份信息不通过';
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * 更新抽奖核销码状态，同步推送到用户
     */
    public function qrcode(Request $request)
    {
        $qrcode = Yp_user::where('openid', $request->openid)
            ->first();
        if ($qrcode != null) {
            $qrcode->status = '1';
            $qrcode->save();
            event(new QrcodeVerify($request->openid));
            return response()
                ->json(['code' => 1, 'desc' => 'success']);
        } else {
            return response()
                ->json(['code' => 0, 'desc' => '未找到指定记录']);
        }
    }
    public function qrcode_test($phone)
    {
        $qrcode = Yp_user::where('customermobile', $phone)
            ->first();
        if ($qrcode != null) {
            $qrcode->status = '1';
            $qrcode->save();
            return response()
                 ->json(['code' => 1, 'desc' => 'success']);
        } else {
            return response()
                ->json(['code' => 0, 'desc' => '未找到指定记录']);
        }
    }

    /**
     * @param Request $request
     * @return mixed
     * 返回场次信息
     */
    public function location(Request $request)
    {
        if ($request->type == 'province') {
            $provinces = Location::all()->unique('province')->pluck('province');
            return $provinces->toJson();
        } elseif ($request->type == 'city') {
            $cities = Location::where('province', $request->value)
                ->get()
                ->unique('city')
                ->pluck('city');
            return $cities->toJson();
        } elseif ($request->type == 'location') {
            $locations = Location::where('city', $request->value)
                ->pluck('location');
            return $locations->toJson();
        }
    }

    /**
     * @param Request $request
     * @return string
     * 验证选择场次验证码
     */
    public function verify(Request $request)
    {
        $location = Location::where('location', $request->location)->first();
        if ($location->verify == $request->verify) {
            return 'true';
        } else {
            return 'false';
        }
    }

    /**
     * @param $customermobile
     * @param $openid
     * @param null $qrcode_url
     * 存储一品皇家用户信息
     */
    public function yp_user_store($customermobile, $openid, $qrcode_url = null)
    {
        $user = new Yp_user;
        $user->openid = $openid;
        $user->customermobile = $customermobile;
        $user->qrcode_url = $qrcode_url;
        $user->save();
    }

    public function qrcode_url($openid=null, $customermobile=null, $prize=0, $location=null)
    {
        switch ($prize){
            case 0 :
                $prize_code = 'YPHJ01';
                break;
            case 1 :
                $prize_code = 'YPHJ02';
                break;
            case 2 :
                $prize_code = 'YPHJ03';
                break;
            case 3 :
                $prize_code = 'YPHJ04';
                break;
        }
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
      <qrcode_data>{"campaigncode":"GiftYPHJ","giftcode":"'.$prize_code.'","customermobile":"'.$customermobile.'",
      "openid":"'.$openid.'","location":"'.$location.'"}</qrcode_data>
    </GetCommonQrcode>
  </soap12:Body>
</soap12:Envelope>';
//        $postdata = http_build_query($post_data);
        $options = array(
            'http' => array(
                'method' => 'POST',
                'header' => 'Content-Type:text/xml;charset=UTF-8',
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
        return $arr;
    }

    /**
     * @return string
     * 抽奖
     */
    public function draw($location = 'test')
    {
        //查询该场次奖品
        $locate = Location::where('location', $location)->first();
        //第一种情况,两个奖品都没有抽完
        if ($locate->towel > 0 && $locate->award > 0 ) {
            $prize = Prize::first();
            $prize0 = $prize->tp;//毛巾礼盒
            $prize1 = $prize->cot;//小床
            $prize2 = $prize->cream;//妙思乐
            $prize3 = $prize->towel;//普通毛巾礼盒
            $sum = $prize0 + $prize1 + $prize2 + $prize3;
            //奖品总数为0
            if ($sum < 1) {
                return '4';
            }

            $random = mt_rand(1, $sum);//抽取随机数
            if ($random <= $prize0){
                //库存量相应减少
                $prize->tp -= 1;
                $prize->save();
                //该场次抽奖数减少
                $locate->award -= 1;
                $locate->save();
                return '0';
            }elseif ($random > $prize0 && $random <= ($prize0 + $prize1)){
                //库存量相应减少
                $prize->cot -= 1;
                $prize->save();
                //该场次抽奖数减少
                $locate->award -= 1;
                $locate->save();
                return '1';
            }elseif ($random > ($prize0 + $prize1) && $random <= ($prize0 + $prize1 + $prize2)){
                //库存量相应减少
                $prize->cream -= 1;
                $prize->save();
                //该场次抽奖数减少
                $locate->award -= 1;
                $locate->save();
                return '2';
            }else {
                //库存量相应减少
                $prize->towel -= 1;
                $prize->save();
                //该场次抽奖数减少
                $locate->towel -= 1;
                $locate->save();
                return '3';
            }
        } elseif ($locate->towel <= 0 && $locate->award >0){
            //第二种情况，普通毛巾都已经抽完
            $prize = Prize::first();
            $prize0 = $prize->tp;//毛巾礼盒
            $prize1 = $prize->cot;//小床
            $prize2 = $prize->cream;//妙思乐
            $sum = $prize0 + $prize1 + $prize2;
            //奖品总数为0
            if ($sum < 1) {
                return '4';
            }

            $random = mt_rand(1, $sum);//抽取随机数
            if ($random <= $prize0){
                //库存量相应减少
                $prize->tp -= 1;
                $prize->save();
                //该场次抽奖数减少
                $locate->award -= 1;
                $locate->save();
                return '0';
            }elseif ($random > $prize0 && $random <= ($prize0 + $prize1)){
                //库存量相应减少
                $prize->cot -= 1;
                $prize->save();
                //该场次抽奖数减少
                $locate->award -= 1;
                $locate->save();
                return '1';
            }elseif ($random > ($prize0 + $prize1) && $random <= ($prize0 + $prize1 + $prize2)){
                //库存量相应减少
                $prize->cream -= 1;
                $prize->save();
                //该场次抽奖数减少
                $locate->award -= 1;
                $locate->save();
                return '2';
            }
        } elseif ($locate->towel > 0 && $locate->award <=0){
            //第三种情况，剩余毛巾没有抽完
            $prize = Prize::first();
            $prize0 = $prize->towel;//普通毛巾礼盒
            //奖品总数为0
            if ($prize0 < 1) {
                return '4';
            }
            //库存量减少
            $prize->towel -= 1;
            $prize->save();
            //该场次抽奖数减少
            $locate->towel -= 1;
            $locate->save();
            return '3';
        }else {
            //第四种情况，两个奖品都已经抽完
            return '4';
        }

    }
}
