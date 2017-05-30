@extends('layouts.converse')

@section('style')

@endsection

@section('content')
 	<div class="page page1 pageBegin">
		<img src="{{asset('converse/img/loading/loading2-fix.gif')}}">
	</div>

@endsection

@section('javascript')
<script type="application/javascript">
    $(function () {
        // 第一页跳转
        setTimeout(function() {
            window.location.href = 'http://wx.touchworld-sh.com/kw/select';
            // setTimeout(function() {
            // 	$('.page2').animate({ 'top': '-200%' }, 3000);
            // }, 1500)
        }, 2500);
    })
</script>
@endsection