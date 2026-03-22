$(function() {
    //ユーザーエージェント取得
    var _ua = (function(u){
        return {
            Tablet:(u.indexOf("windows") != -1 && u.indexOf("touch") != -1 && u.indexOf("tablet pc") == -1) 
            || u.indexOf("ipad") != -1
            || (u.indexOf("android") != -1 && u.indexOf("mobile") == -1)
            || (u.indexOf("firefox") != -1 && u.indexOf("tablet") != -1)
            || u.indexOf("kindle") != -1
            || u.indexOf("silk") != -1
            || u.indexOf("playbook") != -1,
            Mobile:(u.indexOf("windows") != -1 && u.indexOf("phone") != -1)
            || u.indexOf("iphone") != -1
            || u.indexOf("ipod") != -1
            || (u.indexOf("android") != -1 && u.indexOf("mobile") != -1)
            || (u.indexOf("firefox") != -1 && u.indexOf("mobile") != -1)
            || u.indexOf("blackberry") != -1
        }
    })(window.navigator.userAgent.toLowerCase());

    //スクロールバーの有無をチェック
    var cHeight;
    var bHeight;
    function hCheck(){
        cHeight = document.body.clientHeight ;
        bHeight = window.innerHeight;
        //console.log(cHeight+'#'+bHeight);
        if(cHeight > bHeight){
            return true;
        }else{
            return false;
        }
    }

    // URLを取得して「?]で分割「&」でも分割
    var intro_flag = 1;//1で再生,0で再生なし
    function getQueryVariable(variable) {
        var query = window.location.search.substring(1);
        var vars = query.split("&");
        for (var i=0;i<vars.length;i++) {
            var pair = vars[i].split("=");
            if (pair[0] == variable) {
                return pair[1];
            }
        }
        //alert('Query Variable ' + variable + ' not found');
    }
    intro_flag = getQueryVariable('intro');
    if(intro_flag != 0){
        intro_flag = 1;
    }
    console.log(intro_flag);
    

    ///////////////////////////////////////////
    /**スマホ or それ以外**/    
    ///////////////////////////////////////////

    var init = 0;
    if(_ua.Mobile){
        hCheck();
        //この中のコードはスマホのみ適用
        $('.drawer').drawer();
        /**$('#splash-slide').css({
                    'top':(bHeight-378)/2
                });
        $('.splash').animate({
            'opacity':100
        });**/
        if(intro_flag == 0){
            $('#splash').css({
                'display':'none'
            });
        }else{
            splash1();
            $('#splash-img').click(function () {
                splashEnd(0);
            });
        }



    }else{
        
        
        //初回とリサイズ時に実行
        $(window).on('load resize', function(){
            $('#splash').css({
                'display':'none'
            });
            
            hCheck();




            if(hCheck()){
                $('#splash').css({
                    'height':bHeight
                });
                $('#splash-slide').css({
                    'top':(bHeight-378)/2
                });

            }
            if(init == 0){
                
                if(intro_flag == 0){
                    
                }else{
                    $('#splash').css({
                        'display':'block'
                    });
                    $('.splash').animate({
                        'opacity':100
                    });
                    splash1();
                }
                

                init = 1;
            }


            //ヘッダーがついてくるやつ
            //ロード or スクロールされると実行
            /**
            $(window).on('load scroll', function(){
                if (jQuery(window).scrollTop() > 114) {
                    if(sPos == 0){
                        jQuery('header').addClass('scroll');
                        jQuery('.scroll').css({top: '-50px',opacity:'0'});
                        jQuery('.scroll').animate(
                            {top: 0,opacity:'1'},
                            {duration: "slow"}
                        );
                        sPos = 1;
                    }
                } else {
                    jQuery('header').removeClass('scroll');
                    sPos = 0;
                }
            });


            $('ul#dropdown > li').hover(function () {
                if(!inithover){
                    inithover = true;
                }

                var jthis = $(this);
                if (jthis.hasClass('active')) {
                    jthis.removeClass('active')
                        .children('div').stop().slideUp('20');
                } else {
                    jthis.addClass('active')
                        .siblings('li.active').removeClass('active')
                        .end().children('div').stop().slideDown('20')
                        .end().siblings('li').children('ul:visible').stop().slideUp();
                }
            });
            **/

        });
    }


    var inithover = false;
    var waittime = 3000;
    var fadetime = 1500;
    var fadeouttime = 500;


    


    $(window).scroll(function () {
        splashEnd();
    });

    var video = document.querySelector('video');
    video.addEventListener('ended', function(){
        //console.log('addEventListenerによるイベント発火');
        splashEnd(1500);
    });

    $('#splash-slide').click(function () {
        splashEnd(0);
    });
    function splashEnd(dtime){
        $('#splash').delay(dtime).animate({
            opacity: 0.0
        },
                                          {
            'duration': 1000,
            complete:function(){
                $('#splash').css({
                    'display':'none'
                });
            }
        }
                                         );
    }   


    function splash1(){
        $('#s1').animate({ 
            opacity: 1.0
        },
                         {
            duration:fadetime,
            complete:function(){
                $('#s1').delay(waittime).animate({
                    opacity: 0.0
                },{
                    duration:fadeouttime,
                    complete:function(){
                        splash2();
                        $('#s1').css({
                            'display':'none'
                        });
                    }
                }
                                                );

            }
        }
                        );
    }
    function splash2(){
        $('#s2').delay(waittime).animate({
            opacity: 0.0
        },{
            duration:fadeouttime,
            complete:function(){
                splash3();
                $('#s2').css({
                    'display':'none'
                });
            }
        }
                                        );
    }
    function splash3(){
        $('#s3').delay(waittime).animate({
            opacity: 0.0
        },{
            duration:fadeouttime,
            complete:function(){
                splash4();
                $('#s3').css({
                    'display':'none'
                });
            }
        }
                                        );
    }
    function splash4(){
        setTimeout(function(){
            $('#splash').delay(waittime).animate({
                opacity: 0.0
            });
            //window.location.href = '/top.html';
        }, 3000);
    }
    function splash5(){
        $('#s5').animate({ 
            opacity: 1.0
        },
                         {
            duration:fadetime,
            complete:function(){
                $('#s5').delay(waittime).animate({
                    opacity: 0.0
                },{
                    duration:fadeouttime,
                    complete:function(){
                        splash6();
                    }
                }
                                                );

            }
        }
                        );
    }
    function splash6(){
        $('#s6').animate({ 
            opacity: 1.0
        },
                         {
            duration:fadetime,
            complete:function(){
                setTimeout(function(){
                    $('#splash').delay(waittime).animate({
                        opacity: 0.0
                    });
                    //window.location.href = '/top.html';
                }, 3000);
            }
        }
                        );
    }

    /**
    var inithover = false;
    $('#splash-slide ul').slick({
        infinite: false,
        dots:false,
        slidesToShow: 1,

        autoplay:true, //自動再生
        autoplaySpeed: 3000,
        fade: true,
        draggable: false,
        easing:'easeInOutQuart',
        prevArrow:false,
        nextArrow:false,
        pauseOnHover:false,
        speed:2000,
        responsive: [{
            breakpoint: 480,
            settings: {
                centerMode: false,
            }
        }]
    });
    **/

    //その他実行FUNCTION
    /**smoothScroll.init({
        updateURL: false
    });**/



});