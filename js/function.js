$(function() {
    $('#slide ul').slick({
        infinite: true,
        dots:true,
        slidesToShow: 1,
        centerMode: true, //要素を中央寄せ
        centerPadding:'0px', //両サイドの見えている部分のサイズ
        autoplay:true, //自動再生
        autoplaySpeed: 4000,
        draggable: true,
        easing:'easeInOutQuart',
        prevArrow:true,
        nextArrow:true,
        speed:1200,
        responsive: [{
            breakpoint: 480,
            settings: {
                centerMode: false,
            }
        }]
    });
    /**smoothScroll.init({
        updateURL: false
    });**/
    $('.drawer').drawer();
});

$(window).load(function(){
    $("#recentryItem>div>dl").heightLine({
        minWidth:480
    });
    
    
    var mVideo;
    var yPos = 0;
    var endAction = 0;
    function init(){    
        mVideo = document.getElementById("top_video");
        mVideo.addEventListener("ended", function(){
            if(endAction == 0){
                //var p = $("#recentry").offset().top;
               // $('html,body').animate({ scrollTop: p }, 'slow');
                $('#video_arrow').css({
                    opacity: 0,
                    display: 'block'
                });
                $('#video_arrow').animate({ 
                    opacity: 1,
                    bottom: -35
                }, 1500 );
            }
            return false;
        }, true);
        mVideo.addEventListener("timeupdate", function() {
            yPos = $(window).scrollTop();
            if(yPos){
                endAction = 1;
            }
        }, true);
        
        
    };
    $(function(){
        init();
    });
    
});






