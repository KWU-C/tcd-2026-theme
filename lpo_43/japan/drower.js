/**(function() {
    console.log("a123456");
    
    
    $('p#drower_open_btn--header').on('click', function(e) {
        $('#drower').css({
            'transition-duration': '300ms',
            'transform': 'translate3D(-260px,0,0)'
        });
    });
    $('#drower_close_btn--top').on('click', function(e) {
        $('#drower').css({
            'transition-duration': '300ms',
            'transform': 'translate3D(0,0,0)'
        });
    });
})();**/
/**
var $jq = jQuery.noConflict(); //jQueryの$関数を$jへ変更
$jq(document).ready(function() {
    console.log("123456789");
    $jq('#box').on('click', function() {
        alert("クリックされました");
    });
});
**/


jQuery.noConflict();
(function($) { 
    $(function() {
        // この範囲では$がjQueryオブジェクトになる
        $('#drower_open_btn--header').click(function(){
            console.log("a123456");
            $('#drower').animate({
                right:-20
            }, 500);
        });
        $('#drower_close_btn--top').click(function(){
            console.log("a123456");
            $('#drower').animate({
                right:-260
            }, 500);
        });
        //hide();
    });
})(jQuery);