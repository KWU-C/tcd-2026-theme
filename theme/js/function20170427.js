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
    smoothScroll.init({
        updateURL: false
    });
    $('.drawer').drawer();
});

$(window).load(function(){
    $("#recentryItem>div>dl").heightLine({
        minWidth:480
    });
});

