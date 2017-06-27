<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title></title>
    <meta name="viewport" content="width=640,target-densitydpi=device-dpi,user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{ asset('yp/css/index.css') }}"/>
</head>
<body>
<!--不符合注册礼领取条件-->
<div class="all activity">
    <img src="{{ asset('yp/img/acctivity/activitybg.png') }}" alt="" class="activitybg" />
    <img src="{{ asset('yp/img/acctivity/acctibtn.png') }}" class="activitybtn" onclick="change()"/>
</div>
<!--领取优惠券页面-->
<div class="draw all hidden">
    <img src="{{ asset('yp/img/lqw.png') }}"/>
</div>
</body>
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script type="application/javascript">
    function change() {
        $('.draw').show().siblings().hide();
    }
</script>
</html>