<!DOCTYPE html>
<html>

<head>
    <title>解密皇家第一道奶源</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=640,target-densitydpi=device-dpi,user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{ asset('yp/css/lottery.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('yp/css/index.css') }}">
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
<!--抽奖页面-->
<div class="page lottery " id="lottery">
    <div class="lottery-unit lottery-unit-0">
        <img src="{{ asset('yp/img/lottery/top.png') }}">
        <img src="{{ asset('yp/img/lottery/maskTop.png') }}" class="mask">
    </div>
    <div class="lottery-unit lottery-unit-1">
        <img src="{{ asset('yp/img/lottery/right.png') }}">
        <img src="{{ asset('yp/img/lottery/maskRight.png') }}" class="mask">
    </div>
    <div class="lottery-unit lottery-unit-2">
        <img src="{{ asset('yp/img/lottery/bottom.png') }}">
        <img src="{{ asset('yp/img/lottery/maskBottom.png') }}" class="mask">
    </div>
    <div class="lottery-unit lottery-unit-3">
        <img src="{{ asset('yp/img/lottery/left.png') }}">
        <img src="{{ asset('yp/img/lottery/maskLeft.png') }}" class="mask">
    </div>
    <img class="lottery-center" src="{{ asset('yp/img/lottery/center.png') }}">
    <img class="lottery-btn" src="{{ asset('yp/img/lottery/btn.png') }}">
</div>
<!--领奖页面-->
<div class="prize all hidden">
    <img class="prizebg" src="{{ asset('yp/img/prize/pri.png') }}"/>
    <!--获得的奖品名称-->
    <p>妙思乐贝贝护肤四件套</p>
    <!--获得奖品对应的图片-->
    <div class="priAll">
        <img src="{{ asset('yp/img/prize/3.png') }}" alt="" class="pri"/>

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
    <a href="{{ url('draw/new') }}" class="accbtn">
        <img  src="{{ asset('yp/img/accprize/accbtn.png') }}"/>
    </a>
</div>
<script type="text/javascript">
    var lottery = {
        index: -1, //当前转动到哪个位置，起点位置
        count: 0, //总共有多少个位置
        timer: 0, //setTimeout的ID，用clearTimeout清除
        speed: 20, //初始转动速度
        times: 0, //转动次数
        cycle: 50, //转动基本次数：即至少需要转动多少次再进入抽奖环节
        prize: -1, //中奖位置,-1为随机
        pri: ['Terry Palmer 皇家至臻毛巾礼盒', 'Safty 1st 轻柔入梦4件套', '妙思乐贝贝护肤四件套', '内野毛巾礼盒'],
        init: function (id) {
            if ($("#" + id).find(".lottery-unit").length > 0) {
                $lottery = $("#" + id);
                $units = $lottery.find(".lottery-unit");
                this.obj = $lottery;
                this.count = $units.length;
                $lottery.find(".lottery-unit-" + this.index).addClass("active");
            }
            ;
        },
        roll: function () {
            var index = this.index;
            var count = this.count;
            var lottery = this.obj;
            $(lottery).find(".lottery-unit-" + index).removeClass("active");
            index += 1;
            if (index > count - 1) {
                index = 0;
            }
            ;
            $(lottery).find(".lottery-unit-" + index).addClass("active");
            this.index = index;
            return false;
        },
        stop: function (index) {
            this.prize = index;
            return false;
        }
    };

    function roll() {
        lottery.times += 1;
        lottery.roll(); //转动过程调用的是lottery的roll方法，这里是第一次调用初始化
        if (lottery.times > lottery.cycle + 10 && lottery.prize == lottery.index) {
            clearTimeout(lottery.timer);
            lottery.prize = -1;
            lottery.times = 0;
//					alert(lottery.pri[lottery.index - 1]);
            //奖品名称
            $('.prize p').text(lottery.pri[lottery.index]);
            setTimeout(function () {
                $('.prize .pri').attr('src', 'yp/img/prize/' + (lottery.index) + '.png');

                $('.prize').show().siblings().hide();
            }, 2000)

        } else {
            if (lottery.times < lottery.cycle) {
                lottery.speed -= 10;
            } else if (lottery.times == lottery.cycle) {
                var index = {{$prize}}; //中奖物品通过一个随机数生成
                lottery.prize = index;

            } else {
                if (lottery.times > lottery.cycle + 10 && ((lottery.prize == 0 && lottery.index == 7) || lottery.prize == lottery.index + 1)) {
                    lottery.speed += 80;
                } else {
                    lottery.speed += 50;
                }
            }
            if (lottery.speed < 40) {
                lottery.speed = 70;
            }
            ;
            // console.log(lottery.times+'^^^^^^'+lottery.speed+'^^^^^^^'+lottery.prize);
            lottery.timer = setTimeout(roll, lottery.speed); //循环调用
        }
        return false;
    }

    var click = false;

    window.onload = function () {
        lottery.init('lottery');
        $(".lottery-btn").click(function () {
            if (click) { //click控制一次抽奖过程中不能重复点击抽奖按钮，后面的点击不响应
                return false;
            } else {
                lottery.speed = 100;
                roll(); //转圈过程不响应click事件，会将click置为false
                click = true; //一次抽奖完成后，设置click为true，可继续抽奖
                return false;
            }
        });
    };
</script>
</body>
<script src="//{{ Request::getHost() }}:8000/socket.io/socket.io.js"></script>
<script type="application/javascript">
    var openid = '{{$openid}}';
    var socket = io('http://{{ Request::getHost() }}:8000');
    socket.on('main-channel:App\\Events\\QrcodeVerify', function (data) {
        if ( openid == data.openid) {
            $('.accPrize').show().siblings().hide();
        }
    })
</script>
</html>