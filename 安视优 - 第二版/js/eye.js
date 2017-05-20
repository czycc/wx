//开始游戏
$('.page1 .beginPlay img').click(function() {

	$('.page2').show().siblings().hide();

})
//第十天继续清洗,扔掉

//继续清洗
$('.page3 .goBtm img').click(function() {

	$('.page4').show().siblings().hide();

})
$('.page4 .goBtm img').click(function() {

	$('.page5').show().siblings().hide();

})

//扔掉镜片

$('.page .trowBtm img').click(function() {

	$('.page6').show().siblings().hide();
})

//摇一摇
var SHAKE_THRESHOLD = 1800;
var last_update = 0;
var x = y = z = last_x = last_y = last_z = 0;

if(window.DeviceMotionEvent) {
	window.addEventListener('devicemotion', deviceMotionHandler, false);
} else {
	alert('抱歉，你的手机配置实在有些过不去，考虑换个新的再来试试吧');
}
var times = 0;
var num = 0; //统计摇一摇的次数
function deviceMotionHandler(eventData) {

	var acceleration = eventData.accelerationIncludingGravity;
	var curTime = new Date().getTime();

	if((curTime - last_update) > 100) {
		var diffTime = curTime - last_update;
		last_update = curTime;
		x = acceleration.x;
		y = acceleration.y;
		z = acceleration.z;
		var speed = Math.abs(x + y + z - last_x - last_y - last_z) / diffTime * 10000;
		var status = document.getElementById("status");

		if(speed > SHAKE_THRESHOLD) {

			doResult();

			num++; //每摇一次，num加1

		}
		last_x = x;
		last_y = y;
		last_z = z;
	}
}

function doResult() {
	if(times > 0) {
		return false;
	}
	$('.shakeImg').addClass('hand');

	setTimeout(function() {
		times = 0;
		$('.shakeImg').removeClass('hand');
	}, 3000);
}