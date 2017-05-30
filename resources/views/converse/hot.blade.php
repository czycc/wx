@extends('layouts.converse')

@section('style')

@endsection

@section('content')
    <div class=" page3 face " id="page3">
        <div class="container">
            <div class="bg">
                <img src="{{asset('converse/img/photoword/photo22.png')}}"/>
            </div>
            <div class="pic" id="view"></div>
            <div class="page page3Container">
                <form class="personInfo pos" method="post" action="{{ url('/kw/hot/poster') }}">
                    {{ csrf_field() }}
                    <p>
                        我是 <input class="text1 text" class="text2" type="text" name="text1" maxlength="8">, 一个
                        <input class="text2 text" type="text" name="text2"> 的 <input class="text3 text" type="text"
                                                                                     name="text3">。
                    </p>
                    <p>
                        不是谁都懂我的 <input class="text4 text" class="noBelieveText" type="text" name="text4">。
                    </p>
                    <p>
                        对此， <input class="text5 text" class="conText" type="text" name="text5">,
                    </p>
                    <p>因为我相信</p>
                    <p><input class="text6 text" class="believeText" type="text" name="text6">。</p>
                    <p class="lastText">
                        就像这双有表情的鞋，<br/> 不是谁都理解那道弧度的存在
                        <br/> 不懂？
                        <br/> 那就 <input class="text7 text" type="text" name="text7">吧。
                    </p>
                    <input type="hidden" name="avatar" id="postImg">
                    <input type="submit" id="submitBtm"/>
                </form>
                <div class="footerBtn">
                    <img src="{{asset('converse/img/photoword/reset.png')}}" class="footerBtnLeft">
                    <!--<a><img src="img/photoword/generate.png" class="footerBtnRight"></a>-->
                    <label class="footerBtnRightLabel"><img src="{{asset('converse/img/photoword/generate.png')}}"
                                                            class="footerBtnRight"></label>
                </div>
                <div class="popup ">
                    <label class="modal modal1">
                        <img src="{{asset('converse/img/photoword/head.png')}}">
                        <!--<input type="file" accept="image/*" capture="camera"style="display: none">-->
                        <input id="gocamera" style="display: none">

                    </label>
                    <a href="{{ url('kw/rule') }}" class="activity">
                        <img src="{{asset('converse/img/photoword/activity.png')}}"/>
                    </a>
                    <div class="side">
                        <img src="{{asset('converse/img/photoword/side.png')}}"/>
                    </div>
                </div>
                <div class="popup2 hidden">
                    <div class=" modal modal2 ">
                        <img src="{{asset('converse/img/photoword/he.png')}}">
                    </div>
                    <div class="inputText">
                        <img src="{{asset('converse/img/photoword/text.png')}}"/>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="page page4 hidden">
        <div class="bg pos">
            <img src="{{asset('converse/img/camera/Brightness-Contrast-1.png')}}"/>
        </div>
        <div class="picture" id="clipArea"></div>
        <div class="backBtm cBtm">
            <img src="{{asset('converse/img/camera/back.png')}}"/>
        </div>
        <div class="goBtm cBtm" id="goBtm">
            <img src="{{asset('converse/img/camera/ok.png')}}"/>
        </div>
        <div class="popup" id="handHidden">
            <div class="logo">
                <img src="{{asset('converse/img/camera/ti.png')}}"/>
            </div>
            <div class="headText">
                <img src="{{asset('converse/img/camera/tihand.png')}}"/>
            </div>
        </div>

    </div>
@endsection

@section('javascript')
    <script>


        var pc = new PhotoClip('#clipArea', {
            outputSize: 140,
            //adaptive: ['60%', '80%'],
            file: '#gocamera',
            view: '#view', //显示截取后图像的容器的选择器或者DOM对象。
            ok: '#goBtm', //确认截图按钮的选择器或者DOM对象。
            //img: 'img/mm.jpg',
            loadStart: function () {
                //开始加载的回调函数。this指向 fileReader 对象，并将正在加载的 file 对象作为参数传入
                console.log('开始读取照片');
            },
            //加载完成的回调函数。this指向图片对象，并将图片地址作为参数传入。
            loadComplete: function () {

                $('.page4').show().siblings().hide();

                $('.page4 .logo').addClass('logoHand');

                $('.page4 .headText').addClass('logoText');

                console.log('照片读取完成');
            },
            //
            done: function (dataURL) {
                console.log(dataURL);

                $('.face').show().siblings().hide();

                $('.popup').hide();

                $('.popup2').show();

                $('.page3 .popup2 .inputText').addClass('ani');

                $("#postImg").val(dataURL);

                //				$('.popup2 .inputText').animate({'width','26%'},2000);
            },
            fail: function (msg) {
                alert(msg);
            }
        });

        $('.popup2').click(function () {

            $(this).hide();

            $('.text1').focus();

        })

        var handHidden = document.getElementById('handHidden');

        handHidden.addEventListener('touchstart', function () {

            $(this).hide();
        })

        $('.page3 .popup').click(function () {

            $('.page3 .popup .activity').hide();

            $('.page3 .popup .side').show();

            $('.page3 .popup .side').addClass('sideAni');

            setTimeout(function () {

                $('#gocamera').attr('type', 'file');

            })


        })


    </script>
@endsection