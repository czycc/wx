@extends('layouts.converse')

@section('style')

@endsection

@section('content')
    <div class="page page1 pageBegin ">
        <img src="{{ asset('converse/img/loading/loading2.gif') }}">
    </div>
    <div class="page page2 hidden">
        <div class="top">
        </div>

        <div class="bottom">
            <a href="cold.html" class="lBtm btm"><img src="{{ asset('converse/img/mode/lBtm.png') }}"/></a>
            <a href="gramophone.html" class="sayBtm btm"><img src="{{ asset('img/mode/sayBtm.png') }}"/></a>
        </div>

    </div>
@endsection

@section('javascript')

@endsection