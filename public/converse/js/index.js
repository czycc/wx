

//第一页loading

count();

function count(){
	
	var num = 0;
	
	var random = 0;
	
	var index = 0;
	
	$('.page1 .loadText span').html(random+'%');
	
	var timer = setInterval(function(){
		
		num++;
		
		RandomNum((num-1)*20, num*20);
		
		//取
		function RandomNum(Min, Max) {
			
	      var Range = Max - Min;
	      
	      var Rand = Math.random();
	      
	      if(Math.round(Rand * Range)==0){
	      	
	        return Min + 1;
	        
	      }else if(Math.round(Rand * Max)==Max)
	      
	      {
	      	
	        index++;
	        
	        return Max - 1;
	        
	      }else{
	      	
	        random = Min + Math.round(Rand * Range) - 1;
	        
	        return random;
	        
	      }
	      
	 }
		
		
			
		if(num > 5){
				
				clearInterval(timer);
				
				
				
				$('.page2').show().siblings().hide();
				
				$('.page2').animate({'top':'-200%'},3000);
			}
		
		
		
			$('.page1 .loadText span').html(random+'%');
		

		
//		console.log(random);
		
	},1000)
}


//海报生成中

function count2(){

	$('.page33').show();
	
	var random = 0;

	var num = 0;
	
	var index = 0;
	
	$('.page5 .loadText span').html(random+'%');
	
	var timer = setInterval(function(){
		num++;
		
		RandomNum((num-1)*20, num*20);
		
		//取
		function RandomNum(Min, Max) {
			
	      var Range = Max - Min;
	      
	      var Rand = Math.random();
	      
	      if(Math.round(Rand * Range)==0){
	      	
	        return Min + 1;
	        
	      }else if(Math.round(Rand * Max)==Max)
	      
	      {
	      	
	        index++;
	        
	        return Max - 1;
	        
	      }else{
	      	
	        random = Min + Math.round(Rand * Range) - 1;
	        
	        return random;
	        
	      }
	      
	 }

		
		if(num > 5){
			
			clearInterval(timer);
			
			

			clip();
			
			$('.page6').show().siblings().hide();
				
			
		}
		
		
		
		$('.page5 .loadText span').html(random+'%');
		

		
//		console.log(random);
		
	},500)
}
	//生成海报
	$('.footerBtnRight').click(function(){
		
		// console.log(123);
		//高冷模式和话唠模式
	
		
		for(var i = 0;i < $('.personInfo .text').length+1;i++){
			
			$('.personInfo .spanText'+i).html($('.personInfo .text'+i).val()) ;
			
		}
		for(var i = 0;i < $('.personInfo2 .text').length+1;i++){
			
			$('.personInfo2 .spanText'+i).html($('.personInfo2 .text'+i).val()) ;
			
		}

		
		$('.page5').show();
		$('.face').hide();

		//截取图片
	



		// $('.page5').show().siblings().hide();
		
		count2();
		
		
	})

//话唠模式切换

$('.sayBtm img').click(function(){
	
	// console.log(123);

	$('.face').show().siblings().hide();

	$('.personInfo').show();

	$('.personInfo2').hide();


	
});

//高冷模式

$('.lBtm img').click(function(){

	$('.face').show().siblings().hide();

	$('.personInfo2').show();

	$('.personInfo').hide();


})



//重做一次

$('.footerBtnLeft').click(function(){
	
	$('.page3 input').val('');
	
	console.log(123);
})

//重新选择照片

$('.backBtm img').click(function(){
	
	
	
	$('.face').show().siblings().hide();
	
	console.log(123);
})
//第三页
var height = $(window).height();

$('.page3 .container').height(height);

//$('.page3 .page3Container').height(height)



//截屏

function clip(){

//	var pa = document.getElementById('pa');
//
var canvas2 = document.getElementById('canvas2');
var pa = document.getElementById('pa');

//domtoimage.toPng(node)
//  .then(function (dataUrl) {
//  	
//      var img = new Image();
//      
//      img.src = dataUrl;
//      
//      console.log(123);
//      
//     canvas2.appendChild(img);
//  });

	html2canvas(pa).then(function(canvas) {
			
	        var image = canvas.toDataURL("image/jpg");
	        

	        
	        var base=encodeURIComponent(image);//转码
    
      		canvas2.src = image;
      		
//    		console.log(base);
	        
//     		 ajaxUpLoad(base);
//	        var pHtml = "<img src="+image+" />";  
//	        $('#html2canvas').html(pHtml);  

     	})	
	}

//图片上传
function ajaxUpLoad(base){
    $.ajax({
        type: "POST",
        url: "",
        async: true,
        data: {base:base},
        dataType: "json",
        success: function (data) {
        	
        	console.log(success);
        },
        error: function (err) {
        	
        	console.log(error);
        }
    });
}


// 加白条
space();

function space(){

	var space = $('.spanText');

for(var i = 0;i < space.length;i++){
		
		var reg = /[a-zA-Z0-9]+/;
		
		var eText = $('.spanText').eq(i).text();
		
		for(var j = 0;j < eText.length;j++){
			
//			console.log(eText.substring(j,j+1))
			
			
			
		}


		var len = $('.spanText').eq(i).text().length;

		$('.spanText').eq(i).css('background-image','url("img/space/space'+len+'.png")');
		
	}


}


		







