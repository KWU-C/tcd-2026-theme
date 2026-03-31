<?php get_header(); ?>

<div id="mainContents">
  <article class="pt_0">

    <section class="w_full bc_G02 pt_50 pb_100">

      <div class="layoutTyp09">
        <ul>
          <?php
          $about_posts = get_posts(array(
            'post_type'      => 'about',
            'posts_per_page' => -1,
            'orderby'        => 'date',
            'order'          => 'DESC',
          ));
          echo "<li><a href='/about/'>TOP</a></li>";
          foreach ($about_posts as $p) {
            $active = ($p->ID === get_the_ID()) ? ' class="active"' : '';
            echo "<li{$active}><a href='" . get_permalink($p->ID) . "'>" . esc_html($p->post_title) . "</a></li>";
          }
          ?>
        </ul>
      </div>

      <div class="layoutTyp08">

        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>

          <div class="layoutTyp08_Title pt_100">
            <h1 class="h-page"><?php the_title(); ?></h1>
          </div>

          <div class="layoutTyp08_Inner">
            <div class="detail__main_cont">
              <?php
              remove_filter('the_content', 'wpautop');
              the_content();
              ?>
            </div>
          </div>

          <?php endwhile; ?>
        <?php endif; ?>

      </div>

    </section>

  </article>
</div>

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

<?php get_footer(); ?>
