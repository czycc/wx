<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title></title>
    <meta name="viewport" content="width=640,target-densitydpi=device-dpi,user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{ asset('yp/css/lottery.css') }}">
</head>
<body>
<!--领奖页面-->
<div class="prize all">
    <img class="prizebg" src="{{ asset('yp/img/prize/pri.png') }}"/>
    <!--获得的奖品名称-->
    <p>妙思乐贝贝护肤四件套</p>
    <!--获得奖品对应的图片-->
    <div class="priAll">
        <img src="{{ asset('yp/img/prize/'.$prize.'.png') }}" alt="" class="pri"/>

    </div>

    <div class="ewAll">
        <img class="ewbg" src="{{ asset('yp/img/prize/erweimabg.png') }}"/>
        <!--二维码-->
        <img class="ew" src="{{ $qrcode_url }}" alt=""/>

    </div>
    <a href="{{ url('draw/new') }}">
        <img src="{{ asset('yp/img/prize/lqprizebtn.png') }}" alt="" class="priBtn"/>
    </a>
</div>

<!--兑换奖品成功-->
<div class="all accPrize hidden">
    <img class="accbg" src="{{ asset('yp/img/accprize/success.png') }}"/>
    <a href="{{ url('draw/new') }}">
        <img class="accbtn" src="{{ asset('yp/img/accprize/accbtn.png') }}"/>
    </a>
</div>
</body>
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
</html>
