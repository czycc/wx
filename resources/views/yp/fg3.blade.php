<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=640,target-densitydpi=device-dpi,user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{ asset('yp/yp2/css/index.css') }}"/>
    <title></title>
</head>
<body>
<!--参加活动说明（老用户）-->
<div class="page2 page">
    <img class="lqBtn" src="{{ asset('yp/yp2/img/lqBtn2.png') }}" onclick="change()"/>
</div>
<div class="page page3 hidden">

</div>
</body>
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script type="application/javascript">
    function change() {
        $('.page3').show().siblings().hide();
    }
</script>
</html>