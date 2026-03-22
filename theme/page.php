<?php get_header(); ?>

<div id="mainContents">
  <article class="pt_0">
    <section class="w_full bc_G02 pt_50 pb_100">
      <div class="layoutTyp08">

<?php
remove_filter('the_content', 'wpautop');
the_content();
?>

      </div>
    </section>
  </article>
</div>

<?php if(is_page(array('キャリア採用　東京（銀座）・芦屋（本社）', '2023年度新卒採用', '採用ポリシー', 'Company Profile', '会社概要', 'Our Working Style', 'Our Capability'))): ?>
<link rel="stylesheet" href="<?php echo do_shortcode('[themePass]'); ?>/common/js/lib/slider/jquery.bxslider.css" />
<script type="text/javascript" src="<?php echo do_shortcode('[themePass]'); ?>/common/js/lib/slider/jquery.bxslider.min.js"></script>
<script>
$(function(){
  $(window).load(function(){
    var winW = $(window).width();
    $(".AboutMv01").css("opacity" , "1");
    if(winW > 767){
      $(".AboutMv01").bxSlider({
        ticker: true,
        speed: 100000,
        maxSlides: 10,
        moveSlides: 1,
        slideWidth: 235,
        slideMargin: 20,
        controls: false,
        pager: false,
        startSlide: 1
      });
    } else {
      $(".AboutMv01").bxSlider({
        ticker: true,
        speed: 100000,
        maxSlides: 10,
        moveSlides: 1,
        slideWidth: 235,
        slideMargin: 0,
        controls: false,
        pager: false,
        startSlide: 1
      });
    }
  });
});
</script>

<?php elseif(is_page("desart")): ?>
<link rel="stylesheet" href="<?php echo do_shortcode('[themePass]'); ?>/common/js/lib/slider/jquery.bxslider.css" />
<script type="text/javascript" src="<?php echo do_shortcode('[themePass]'); ?>/common/js/lib/slider/jquery.bxslider.min.js"></script>
<script>
$(function(){
  var w = $(window).width();
  $(window).on({
    load: function () {
      $(".serviceTyp12 .mvArea").animate({ opacity: 1 }, { duration: 500, easing: 'linear' });
      if(w > 767){
        var slider = $('.serviceTyp12 .mvArea').bxSlider({
          auto: true,
          mode: 'horizontal',
          speed: 1000,
          pause: 4000,
          controls: false,
          pager: false,
          minSlides : 1,
          maxSlides : 2,
          slideWidth : 880
        });
      } else {
        $('.serviceTyp12 .mvArea').bxSlider({
          auto: true,
          mode: 'horizontal',
          speed: 1000,
          pause: 4000,
          controls: false,
          pager: false,
        });
      }
    }
  });
});
</script>

<?php elseif(is_page("download")): ?>
<script>
$(function(){
  function syncCheckboxToHidden(uiName, hiddenName) {
    let values = [];
    $('input[name="' + uiName + '[data][]"]:checked').each(function () {
      values.push($(this).val());
    });
    $('input[name="' + hiddenName + '"]').val(values.join(';'));
  }
  $(document).on(
    'change',
    'input[name="f_01_ui[data][]"], input[name="f_07_ui[data][]"]',
    function () {
      syncCheckboxToHidden('f_01_ui', 'f_01');
      syncCheckboxToHidden('f_07_ui', 'f_07');
    }
  );
  syncCheckboxToHidden('f_01_ui', 'f_01');
  syncCheckboxToHidden('f_07_ui', 'f_07');
});
</script>

<?php endif; ?>

<?php get_footer(); ?>
