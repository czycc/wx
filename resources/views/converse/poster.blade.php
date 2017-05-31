@extends('layouts.converse')

@section('style')

@endsection

@section('content')
    <div class="page loading">
        <img src="{{asset('converse/img/loading/loading.gif')}}"/>
    </div>
    <div class="page poster hidden">
        <div class="center pos">
            <img src="{!! $img_url !!}"/>
            <div class="frame"></div>
        </div>
        <div class="copy">
            <img src="{{asset('converse/img/poster/adjectText.png')}}"/>
        </div>
        <a class="link" href="https://www.converse.com.cn/jack_summer/category.htm?iid=npkvnv051120171400&cid=socwxjpinjackpurcellh5">
            <img src="{{asset('converse/img/poster/link.png')}}"/>
        </a>
        <div class="mask"></div>
    </div>
@endsection

@section('javascript')

@endsection