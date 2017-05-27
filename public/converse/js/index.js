//第一页loading
$(function() {
    // 第一页跳转
    setTimeout(function() {
        $(".page1").hide();
        $(".page2").show();
        setTimeout(function() {
            $('.page2').animate({ 'top': '-200%' }, 3000);
        }, 1500)
    }, 3500);

    //判断设备
    var platfrom = navigator.userAgent;
    var regplatfrom = /iPhone/gi;
    console.log("IOS");
    if(!regplatfrom.test(platfrom)) {
        console.log("Android");
        $("#gocamera").attr("accept", "image/*");
        $("#gocamera").attr("capture", "camera");
    }

    //第三页
    var height = $(window).height();
    $('.face .container').height(height);
    $('.page33 .page33Container').height(height);

    //重做一次
    $('.footerBtnLeft').click(function() {
        $('.page3 input').val('');
        $('.popup').show();
        $('#view').css('background-image', '');
    });

    //重新选择照片
    $('.backBtm img').click(function() {
        $('.face').show().siblings().hide();
    });

    //全输入验证
    $(".text").blur(function() {
        if(allInput($('.text'))) {
            $(".footerBtnRight").attr("src", "../converse/img/photoword/bluefooterBtnRight.png");
        } else {
            $(".footerBtnRight").attr("src", "../converse/img/photoword/generate.png");
        };
    });

    function allInput(val) {
        if($(".pic").css("background-image") == "") {
            return false;
        }
        for(var i = 0; i < val.length; i++) {
            if(val[i].value == "") {
                return false;
            }
        }
        return true;
    }

    //字符限制
    limit();
    //吐槽模式
    function limit() {
        var reg = /[a-zA-Z0-9]+/;
        var maxLength1 = [6, 4, 6, 8, 8, 18, 8];
        $('.personInfo .text').each(function(index) {
            this.oninput = function() {
                var len = 0;
                var cn = 0;
                for(var i = 0; i < this.value.length; i++) {
                    if(reg.test(this.value[i])) {
                        len++;
                    } else {
                        len += 2;
                        if(len - 2 < maxLength1[index]) {
                            cn++;
                        }
                    }
                }
                if(len > maxLength1[index]) {
                    var val = this.value.substring(0, maxLength1[index] - cn);
                    this.value = val;
                }
            }
        });
        
        //高冷模式
        var maxLength2 = [10, 10, 16];
        $('.personInfo2 .text').each(function(index) {
            this.oninput = function() {
                var len = 0;
                var cn = 0;
                for(var i = 0; i < this.value.length; i++) {
                    if(reg.test(this.value[i])) {
                        len++;
                    } else {
                        len += 2;
                        if(len - 2 < maxLength2[index]) {
                            cn++;
                        }
                    }
                }
                if(len > maxLength2[index]) {
                    var val = this.value.substring(0, maxLength2[index] - cn);
                    this.value = val;
                }
            }
        });
    }

    //跳转生成海报

    $('.footerBtnRight').click(function() {
        var reg = /generate/g;
        var src = $(this).attr('src');
        if(!reg.test(src)){
            $(".footerBtnRightLabel").attr("for", "submitBtm");
        }
    })

    //加载页显示
    setTimeout(function() {
        $(".loading").hide();
    }, 3500);

    // 相框隐藏
    setTimeout(function() {
        $(".frame").hide();
        $(".copy").show();
        $(".link").show();
        $(".mask").show().fadeOut(1000);
    }, 4800);

    //点击缩放,手隐藏

//	console.log($('.page4 .bg img'));




})