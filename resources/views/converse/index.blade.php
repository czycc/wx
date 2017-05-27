@extends('layouts.converse')

@section('style')

@endsection

@section('content')
    <div class="page page1 pageBegin ">

    </div>
    <div class="page page2 hidden" id="page2">
        <div class="top"></div>
        <div class="bottom">
            <a href="{{ url('kw/cool') }}" class="lBtm btm"><img src="{{ asset('converse/img/mode/lBtm.png') }}"/></a>
            <a href="{{ url('kw/hot') }}" class="sayBtm btm"><img src="{{ asset('converse/img/mode/sayBtm.png') }}"/></a>
        </div>

    </div>
@endsection

@section('javascript')
	<script type="application/ecmascript">
		var page2 = document.getElementById('page2');
		
			page2.addEventListener('touchmove',function(e){
				
				e.preventDefault();
				
			})
	</script>
@endsection