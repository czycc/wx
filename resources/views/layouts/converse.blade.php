<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title></title>
    <meta name="description" content="">
    <meta name="viewport"
          content="width=device-width,initial-scale=1.0, minimum-scale=1, maximum-scale=1,,user-scalable=no">
    <meta name="format-detection" content="telephone=no,email=no"/>
    <meta http-equiv="X-UA-Compatible" content="chrome=1"/>
    <title>converse</title>
    <link rel="stylesheet" href="{{asset('converse/css/common.css')}}"/>
    <link rel="stylesheet" href="{{asset('converse/css/index.css')}}"/>
    @yield('style')
</head>
<body>

@yield('content')

</body>
<script src="{{asset('converse/js/jquery-1.11.3.min.js')}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset('converse/js/lib/iscroll-zoom.js')}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset('converse/js/lib/hammer.min.js')}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset('converse/js/lib/lrz.all.bundle.js')}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset('converse/js/lib/PhotoClip.js')}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset('converse/js/index.js')}}" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="{{asset('converse/js/html2canvas.js')}}"></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js" type="text/javascript" charset="utf-8"></script>
<script type="application/javascript">
    wx.config(<?php echo $js->config(array('onMenuShareTimeline', 'onMenuShareAppMessage'), false) ?>);
    // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
    wx.ready(function () {
        // 获取“分享到朋友圈”按钮点击状态及自定义分享内容接口
        wx.onMenuShareTimeline({
            title: '有人说了一些不是谁都懂的话,来看看你懂吗?', // 分享标题
            link: "http://wx.touchworld-sh.com/kw",
            imgUrl: "{{asset('converse/img/share.png')}}" // 分享图标
        });
        // 获取“分享给朋友”按钮点击状态及自定义分享内容接口
        wx.onMenuShareAppMessage({
            title: '有人说了一些不是谁都懂的话,来看看你懂吗?', // 分享标题
            desc: "是同类就放胆说你想说的!", // 分享描述
            link: "http://wx.touchworld-sh.com/kw",
            imgUrl: "{{asset('converse/img/share.png')}}", // 分享图标
            type: 'link' // 分享类型,music、video或link，不填默认为link
        });
    });
</script>
@yield('javascript')
</html>
