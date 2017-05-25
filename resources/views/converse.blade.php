<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1, maximum-scale=1,,user-scalable=no">
    <meta name="format-detection" content="telephone=no,email=no"/>
    <meta http-equiv="X-UA-Compatible" content="chrome=1"/>
    <title>converse</title>
    <link rel="stylesheet" href="{{asset('converse/css/common.css')}}"/>
    <link rel="stylesheet" href="{{asset('converse/css/index.css')}}"/>

</head>
<body>
	<div class="page page1 pageBegin ">

			<div class="loadText pos">
				Loading...<span>100%</span>
			</div>
		</div>
		<div class="page page2 hidden">
			<div class="top">

			</div>
			<div class="bottom">
				<div class="lBtm btm">
					<img src="{{asset('converse/img/mode/lBtm.png')}}"/>
				</div>
				<div class="sayBtm btm">
					<img src="{{asset('converse/img/mode/sayBtm.png')}}"/>
				</div>
			</div>
		</div>
		<div class=" page3 face hidden" id="page3">
			<div class="container">
				<div class="bg">
					<img src="{{asset('converse/img/photoword/shoneBody.png')}}"/>
				</div>
				<div class="pic" id="view"></div>
				<div class="page page3Container">
					<div class="personInfo pos ">
						<p>
							我是 <input class="text1 text" class="text2" type="text" name="" maxlength="8">,
							一个 <input class="text2 text" type="text" name="">
							的 <input class="text3 text" type="text" name="">。
						</p>
						<p>
							不是谁都懂我的 <input class="text4 text" class="noBelieveText" type="text" name="">。
						</p>
						<p>
							对此， <input class="text5 text" class="conText" type="text" name="">,
						</p>
						<p>因为我相信</p>
						<p><input class="text6 text" class="believeText" type="text" name="">。</p>
						<p>
							就像这双有表情的鞋，<br/>
							不是谁都理解那道弧度的存在<br/>
							不懂？<br/>
							那就 <input class="text7 text" type="text" name="">吧。
						</p>
					</div>
					<div class="personInfo2 hidden">
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


					</div>
					<div class="footerBtn">
						<img src="{{asset('converse/img/photoword/reset.png')}}" class="footerBtnLeft">
						<img src="{{asset('converse/img/camera/logo.png"')}} class="pos">
						<img src="{{asset('converse/img/photoword/generate.png')}}" class="footerBtnRight">
					</div>
					<div class="popup ">
						<label class="modal modal1">
							<img src="{{asset('converse/img/photoword/hand.png')}}">
							<input type="file" id="gocamera" style="display: none">

						</label>
					</div>
					<div class="popup2 hidden">
						<div class=" modal modal2 ">
							<img src="{{asset('converse/img/photoword/hand2.png')}}">
						</div>
					</div>

				</div>
			</div>
		</div>
		<div class="page page33 hidden" id="pa">
			<div class="page33Container">
				<div class="bg">
					<img src="{{asset('converse/img/photoword/shoneBody.png')}}"/>
				</div>
				<div class="pic" id="view"></div>
				<div class="page page33Container">
					<div class="personInfo3 pos ">
						<p>
							我是 <span class="spanText1 spanText"></span>,
							一个 <span class="spanText2 spanText"></span>
							的<span class="spanText3 spanText"></span>。
						</p>
						<p>
							不是谁都懂我的 <span class="spanText4 spanText"></span>。
						</p>
						<p>
							对此，<span class="spanText5 spanText"></span>,
						</p>
						<p>
							因为我相信 <br/>

							<span class="spanText6 spanText"></span>。
						</p>
						<br/>
						<p class="lastText">
							就像这双有表情的鞋，<br/>
							不是谁都理解那道弧度的存在<br/>
							不懂？<br/>
							那就 <span class="spanText7 spanText"></span>吧。
						</p>
					</div>
					<div class="personInfo4 hidden">
						<div class="top">
							<p>我是<span class="spanText1 spanText">的隔阂</span>，</p>
							<p>不是谁都懂我的<span class="spanText2 spanText">的隔阂</span>，</p>
							<p>但这正是让我成为"我"的原因。</p>
						</div>
						<div class="bottom">
							<p>就像这双有表情的鞋</p>
							<p>不是谁都理解那道弧度的存在</p>
							<p>不懂？</p>
							<p>那就<span class="spanText3 spanText">的隔阂</span>吧。</p>
						</div>


					</div>
					<div class="logo pos">

						<img src="{{asset('converse/img/camera/logo.png')}}" class="pos">

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
				<img src="{{asset('converse/img/camera/ok.png')}}"/>
			</div>
			<div class="logo">
				<img src="{{asset('converse/img/camera/adjust.png')}}"/>
			</div>
		</div>
		<div class="page1 page page5 hidden">
			<div class="bf">
				<img src="{{asset('converse/img/111p1-loading.gif')}}"/>
			</div>
			<div class="loadText pos">
				海报生成中...<span>100%</span>
			</div>
		</div>
		<div class="page page6 hidden">
			<div class="center pos"  id="canvas2">
				<!--<img src="" alt="" />-->
			</div>
			<div class="erweima">
				<img src="{{asset('converse/img/poster/erweima.png')}}"/>
			</div>
			<div class="copy">
				<img src="{{asset('converse/img/poster/adjectText.png')}}"/>
			</div>
			<div class="link">
				<img src="{{asset('converse/img/poster/link.png')}}"/>
			</div>
		</div>
</body>
<script src="{{asset('converse/js/jquery-1.11.3.min.js')}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset('converse/js/lib/iscroll-zoom.js')}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset('converse/js/lib/hammer.min.js')}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset('converse/js/lib/lrz.all.bundle.js')}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset('converse/js/lib/PhotoClip.js')}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset('converse/js/index.js')}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset('converse/js/dom-to-image.min.js')}}" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="{{asset('converse/js/html2canvas.js')}}"></script>
<script>
		var pc = new PhotoClip('#clipArea', {
				outputSize: 140,
				//adaptive: ['60%', '80%'],
				file: '#gocamera',
				view: '#view',//显示截取后图像的容器的选择器或者DOM对象。
				ok: '#goBtm',//确认截图按钮的选择器或者DOM对象。
				//img: 'img/mm.jpg',
				loadStart: function() {
					//开始加载的回调函数。this指向 fileReader 对象，并将正在加载的 file 对象作为参数传入
					console.log('开始读取照片');
				},
				//加载完成的回调函数。this指向图片对象，并将图片地址作为参数传入。
				loadComplete: function() {

					$('.page4').show().siblings().hide();

					console.log('照片读取完成');
				},
				//
				done: function(dataURL) {
					console.log(dataURL);

					$('.face').show().siblings().hide();

					$('.popup').hide();

					$('.popup2').show();
				},
				fail: function(msg) {
					alert(msg);
				}
	});

		$('.popup2').click(function(){

			$(this).hide();

			$('.text1').focus();

		})




</script>
</html>
