@extends('layouts.converse')

@section('style')

@endsection

@section('content')
    <div class="page loading">
        <img src="{{asset('converse/img/loading/loading.gif')}}"/>
    </div>
    <div class="page poster">
        <div class="center pos">
            <img/>
            <div class="frame"></div>
        </div>
        <div class="copy">
            <img src="{{asset('converse/img/poster/adjectText.png')}}"/>
        </div>
        <div class="link">
            <img src="{{asset('converse/img/poster/link.png')}}"/>
        </div>
        <div class="mask"></div>
    </div>
@endsection

@section('javascript')

@endsection