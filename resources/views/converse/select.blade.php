@extends('layouts.converse')

@section('style')

@endsection

@section('content')
    <div class="page page2 " id="page2">
        <img src="{{ asset('converse/img/mode/page2.gif') }}">
        
        <a href="{{ url('kw/cool') }}" class="lBtm btm">
        	<img src="{{ asset('converse/img/mode/lBtm.png') }}"/>
        </a>
        <a href="{{ url('kw/hot') }}" class="sayBtm btm">
        	<img src="{{ asset('converse/img/mode/sayBtm.png') }}"/>
        </a>
    </div>
@endsection

@section('javascript')

@endsection