@extends('layouts.converse')

@section('style')

@endsection

@section('content')
 	<div class="page page1 pageBegin">
		<img src="{{asset('converse/img/loading/loading2-fix.gif')}}">
	</div>
		<div class="page2 hidden" id="page2">
			<div class="top">
				<img src="{{asset('converse/img/mode/men.png')}}" alt="" />
				<img src="{{asset('converse/img/mode/text.png')}}" alt="" />
				<div class="bottom">
					<a href="{{ url('kw/cool') }}" class="lBtm btm"><img src="{{asset('converse/img/mode/lBtm.png')}}" /></a>
					<a href="{{ url('kw/hot') }}" class="sayBtm btm"><img src="{{asset('converse/img/mode/sayBtm.png')}}" /></a>
				</div>
			</div>

		</div>

@endsection

@section('javascript')
<script type="application/javascript">
//  $(function () {
//      // 第一页跳转
//      setTimeout(function() {
//          window.location.href = 'http://wx.touchworld-sh.com/kw/select';
//          // setTimeout(function() {
//          // 	$('.page2').animate({ 'top': '-200%' }, 3000);
//          // }, 1500)
//      }, 2500);
//  })

		var page2 = document.getElementById('page2');

		page2.addEventListener('touchmove', function(e) {

			e.preventDefault();

		});
		
		setTimeout(function() {
			$(".page1").hide();
			$(".page2").show();
			setTimeout(function() {
				$('.page2').animate({ 'top': '-126%' }, 3000);
			}, 1500)
		}, 2500);
</script>
@endsection