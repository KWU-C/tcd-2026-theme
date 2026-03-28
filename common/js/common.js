/*///////////////////////////////////////////////////

 共通 Javascript

///////////////////////////////////////////////////*/


$(function(){

	var winW = $(window).width();
	var winH = $(window).height();

	//読み込み後の処理 //////////////////////////////////////////////
	$(window).load(function(){

	  //外部リンクでのスクロール ///////////////////////////////

		if(winW > 767){
			var scrollSet = 200;
		} else {
			var scrollSet = 100;
		}

		//パラメータ取得
		var pLink = location.search;
		//ページ内リンク指定がある場合
		if (pLink.indexOf("?id=") == -1) {
		}else{
			var pIdName = pLink.replace("?id=","");
			var pSet = $("#"+pIdName).offset().top - scrollSet;
			$("html, body").animate({scrollTop:pSet}, "fast");
		}

		//スクロール
		$('a[href^=#],area[href^=#]').click(function(){
			var speed = 500;
			var href= $(this).attr("href");
			var target = $(href == "#" || href == "" ? 'html' : href);

			var position = target.offset().top - scrollSet;

			$("html, body").animate({scrollTop:position}, speed, "swing");
			return false;
		});

	});


	//ヘッダーアニメーション ///////////////////////////////

	if (winW > 767) {
		var top_pos = 120;
		var logoImg = $("header #logoImg").attr("src");
		var logoImgDown = logoImg.replace("tcd_logo", "tcd_logo_down");

		$(window).scroll(function (e) {
			var current_pos = $(this).scrollTop();

			if (current_pos > top_pos) {
				$("header").addClass("down");
				$("header #logoImg").attr("src", logoImgDown);
			} else {
				$("header").removeClass("down");
				$("header #logoImg").attr("src", logoImg);
			}
		});
	}


	//SNSボタン /////////////////////////////////////////////

	if(winW > 767){
		var sns_pos = 367; //SNSボタン稼働位置
		$(window).scroll(function() {
			var current_pos = $(this).scrollTop();
			//alert(current_pos+":"+sns_pos);
			if (current_pos > sns_pos) {
				$(".layoutTyp08_Sns").addClass("up");
			} else {
				$(".layoutTyp08_Sns").removeClass("up");
			}
		});
	}


	//SP ナビゲーション /////////////////////////////////////////////

	$("#header_SpIcon a").on({
		click: function () {
			var classCk = $(this).attr("class");
			if( classCk == "menu-trigger"){
				$(this).addClass("menu-trigger active");
				$("#overay").css("display","block");
				$("#header_SpMenu").animate({
					left: "0px",
					opacity: "1"
				}, 300 );
			}else{
				$(this).removeClass("menu-trigger active");
				$(this).addClass("menu-trigger");
				$("#overay").css("display","none");
				$("#header_SpMenu").animate({
					left: "-100vw",
					opacity: "0"
				}, 300 );
			}
			return false;
		}
	});


	//フェードイン /////////////////////////////////////////////

	//画面の高さが大きい場合初めを表示しておく
	if(winH >= "1000" || winW <= 767){
		$(".layoutTyp10").css("opacity","1").css("transform" , "translateY(0px)");
	}

	$(window).scroll(function() {
		$(".scrollFade").each(function(){
			var imgPos = $(this).offset().top;
			var scroll = $(window).scrollTop();
			var windowHeight = $(window).height();
			if (scroll > imgPos - windowHeight + windowHeight/5){
				$(this).addClass("fade_on");
			} else {
				// $(this).removeClass("fade_on");
			}
		});
	});




});
