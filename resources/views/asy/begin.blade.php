@extends('layouts.asy')
@section('content')
    <!--第一页 开始页面-->
    <div class="page page1   oldpage">
        <div class="top pos">
            <img src="{{ asset('asy/eyeImg/p1/center.png') }}"/>
        </div>
        <div class="beginPlay ">
            <img src="{{asset('asy/eyeImg/p1/beginPlayBtm.png')}}"/>
        </div>
        <div class="intruText pos">
            <img src="{{ asset('asy/eyeImg/xiugai/instuText.png') }}"/>
        </div>
        <div class="shake pos">
            <div class="shakeText">
                <img src="{{ asset('asy/eyeImg/shakeText.png') }}"/>
            </div>
            <div class="shakeImg">
                <img src="{{ asset('asy/eyeImg/shake.png') }}"/>
            </div>

        </div>
    </div>

@endsection

@section('javascript')
    <script type="application/javascript">
        var socket = io('http://{{ Request::getHost() }}:3000');
        //开始游戏
        socket.emit('change', 'tostart');
        $('.page1 .beginPlay img').click(function () {
            socket.emit('change', 'to1');
            window.location.href = "{{ url('asy/one') }}";
        });
    </script>
@endsection
