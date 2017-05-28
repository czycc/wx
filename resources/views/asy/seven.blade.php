@extends('layouts.asy')

@section('content')

    <!--第三页 第7天-->
    <div class="page page3 newpage">
        <div class="day pos">
            <img src="{{asset('asy/eyeImg/xiugai/7.png')}}"/>
        </div>
        <div class="goBtm">
            <img src="{{asset('asy/eyeImg/p3/goBtm.png')}}"/>
        </div>
        <div class="shake pos">
            <div class="shakeText">
                <img src="{{asset('asy/eyeImg/shakeText.png')}}"/>
            </div>
            <div class="shakeImg">
                <img src="{{asset('asy/eyeImg/shake.png')}}"/>
            </div>

        </div>
    </div>

@endsection

@section('javascript')
    <script type="application/javascript">
        var socket = io('http://{{ Request::getHost() }}:3000');

        //点击按钮跳转
        $('.page3 .goBtm img').click(function () {
            socket.emit('change','to14');
            window.location.href = "{{ url('asy/fourteen') }}";
        });
        //摇一摇
        var SHAKE_THRESHOLD = 1800;
        var last_update = 0;
        var x = y = z = last_x = last_y = last_z = 0;

        if (window.DeviceMotionEvent) {
            window.addEventListener('devicemotion', deviceMotionHandler, false);
        } else {
            alert('抱歉，你的手机配置实在有些过不去，考虑换个新的再来试试吧');
        }
        var times = 0;
        var num = 0; //统计摇一摇的次数
        function deviceMotionHandler(eventData) {

            var acceleration = eventData.accelerationIncludingGravity;
            var curTime = new Date().getTime();

            if ((curTime - last_update) > 100) {
                var diffTime = curTime - last_update;
                last_update = curTime;
                x = acceleration.x;
                y = acceleration.y;
                z = acceleration.z;
                var speed = Math.abs(x + y + z - last_x - last_y - last_z) / diffTime * 10000;
                var status = document.getElementById("status");

                if (speed > SHAKE_THRESHOLD) {

                    doResult();

                    num++; //每摇一次，num加1
                    socket.emit('num',num);
                    if (num > 15) {
                        $('.page3 .goBtm').fadeIn(2000);
                    }

                }
                last_x = x;
                last_y = y;
                last_z = z;
            }
        }

        function doResult() {
            if (times > 0) {
                return false;
            }
            $('.shakeImg').addClass('hand');

            setTimeout(function () {
                times = 0;
                $('.shakeImg').removeClass('hand');


            }, 3000);
        }

    </script>
@endsection