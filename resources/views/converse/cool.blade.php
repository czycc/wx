@extends('layouts.converse')

@section('style')

@endsection

@section('content')
    <div class=" page3 face " id="page3">
        <div class="container">
            <div class="bg">
                <img src="{{ asset('converse/img/photoword/10.png') }}"/>
            </div>
            <div class="pic" id="view"></div>
            <div class="page page3Container">

                <form class="personInfo2">
                    <div class="top">
                        <p>我是<input class="text1 text" type="text">，</p>
                        <p>不是谁都懂我的<input class="text2 text" type="text">，</p>
                        <p>但这正是让我成为"我"的原因。</p>
                    </div>
                    <div class="bottom">
                        <p>就像这双有表情的鞋</p>
                        <p>不是谁都理解那道弧度的存在</p>
                        <p>不懂？</p>
                        <p>那就<input class="text3 text" type="text">吧。</p>
                    </div>
                    <input type="submit" id="submitBtm"/>

                </form>
                <div class="footerBtn">
                    <img src="{{asset('converse/img/photoword/reset.png')}}" class="footerBtnLeft">
                    <img src="{{asset('converse/img/camera/logo.png')}}" class="pos">
                    <label class="footerBtnRight" for="submitBtm"><img
                                src="{{asset('converse/img/photoword/generate.png')}}" class="footerBtnRight"></label>
                </div>
                <div class="popup ">
                    <label class="modal modal1">
                        <img src="{{asset('converse/img/photoword/head.png')}}">
                        <!--<input type="file" accept="image/*" capture="camera"style="display: none">-->
                        <input type="file" id="gocamera" style="display: none">

                    </label>
                    <a href="rule.html" class="activity">
                        <img src="{{asset('converse/img/photoword/activity.png')}}"/>
                    </a>
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
            <img src=""/>
        </div>
        <div class="logo">
            <img src="{{asset('converse/img/camera/ti.png')}}"/>
        </div>
        <div class="headText">
            <img src="{{asset('converse/img/camera/tihand.png')}}"/>
        </div>
    </div>
@endsection

@section('javascript')

@endsection