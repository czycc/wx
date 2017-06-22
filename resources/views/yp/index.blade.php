<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
		<meta name="viewport" content="width=640,target-densitydpi=device-dpi,user-scalable=no">
		<link rel="stylesheet" type="text/css" href="{{ asset('yp/css/index.css') }}"/>
	</head>
	<body>
		<!--领取优惠券页面-->
		<div class="draw all hidden">
			<img src="{{ asset('yp/img/lq.png') }}"/>
		</div>
		
		<!--未购买产品用户页面-->
		<div class="undraw all hidden">
			<img class="undrawbg" src=""/>
			<img src="{{ asset('yp/img/undrawbtn.png') }}" alt="" class="undrawbtn" />
		</div>

		<!--已领注册礼-->
		<div class="all accPrize hidden">
			<img class="accbg" src="{{ asset('yp/img/accprize/accbg.png') }}"/>
			<img class="accbtn" src="{{ asset('yp/img/accprize/accbtn.png') }}"/>
		</div>
		
		<!--兑换奖品成功-->
		<div class="all accPrize">
			<img class="accbg" src="{{ asset('yp/img/accprize/success.png') }}"/>
			<img class="accbtn" src="{{ asset('yp/img/accprize/accbtn.png') }}"/>
		</div>
		
		<!--参加活动说明-->
		<div class="all activity hidden">
			<img src="{{ asset('yp/img/acctivity/activitybg.png') }}" alt="" class="activitybg" />
			<img src="{{ asset('yp/img/acctivity/acctibtn.png') }}" class="activitybtn"/>
		</div>
	</body>
</html>
