jQuery(function() {
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


    ///////////////////////////////////////////
    /**スマホ or それ以外**/    
    ///////////////////////////////////////////
    if(_ua.Mobile){

    }else{
        //初回とリサイズ時に実行
        jQuery(window).on('load resize', function(){
            //ヘッダーがついてくるやつ
            var sPos = 0;
            jQuery(window).on('load scroll', function(){
                if (jQuery(window).scrollTop() > 640) {
                    if(sPos == 0){
                        jQuery('#navigation').addClass('scroll');
                        jQuery('.scroll').css({top: '-50px',opacity:'0'});
                        jQuery('.scroll').animate(
                            {top: 0,opacity:'1'},
                            {duration: "slow"}
                        );
                        sPos = 1;
                    }
                } else {
                    jQuery('#navigation').removeClass('scroll');
                    sPos = 0;
                }
            });
        
            
        });
    }
    
    
});