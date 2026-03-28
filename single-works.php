<?php get_header(); ?>

<div id="mainContents">
  <article class="pt_0">

    <section class="w_full bc_G02 pt_50 pb_100">

      <?php
      $terms = get_the_terms($post->ID,'case_cate');
      $cat_slug_s = array();
      foreach( $terms as $term ) {
        $cat_slug = $term->slug;
        array_push($cat_slug_s,$cat_slug);
      }
      ?>

      <div class="layoutTyp09">
        <ul>
          <li><a href="/works/">TOP</a></li>
          <?php
          $case_terms = get_terms(array(
            'taxonomy'   => 'case_cate',
            'hide_empty' => true,
            'exclude'    => array(get_term_by('slug', 'top', 'case_cate')->term_id),
          ));
          foreach ($case_terms as $term) {
            $active = in_array($term->slug, $cat_slug_s) ? ' class="active"' : '';
            echo "<li{$active}><a href='" . get_term_link($term) . "'>" . esc_html($term->name) . "</a></li>";
          }
          ?>
        </ul>
      </div>

      <div class="layoutTyp08">

      <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); $current_post_id = get_the_ID(); ?>

        <div class="worksTyp03">
          <div class="column c-card-tile">

            <?php if(get_field('works_img02')){ //画像が2つ以上ある場合 ?>

            <div class="column_MV">
              <?php
              for ($i = 1; $i <= 15; $i++) {
                $field_key = 'works_img' . str_pad($i, 2, '0', STR_PAD_LEFT);
                if (get_field($field_key)) {
                  if (ctype_digit(get_field($field_key))) {
                    $img_url = wp_get_attachment_url(get_field($field_key));
                  } else {
                    $img_url = get_field($field_key);
                  }
                  echo '<a hre="javascript:void(0);" class="next"><img src="' . $img_url . '" /></a>';
                }
              }
              ?>
            </div>

            <?php } else { //画像が1つの場合 ?>

            <div class="column_MV_NO">
              <?php if(get_field('works_img01')){
                if (ctype_digit(get_field('works_img01'))) {
                  $img_url = wp_get_attachment_url(get_field('works_img01'));
                } else {
                  $img_url = get_field('works_img01');
                }
              ?>
              <img src="<?php echo $img_url; ?>" />
              <?php } ?>
            </div>

            <?php } ?>

          </div>
          <div class="preLink"></div>
        </div>

        <div class="layoutTyp08_Title">
          <p><?php the_field('works_text01'); ?></p>
          <h1 class="h-page"><?php the_title(); ?></h1>
        </div>

        <div class="layoutTyp08_Inner">
          <div class="detail__main_cont">
            <?php the_content(); ?>
          </div>
          <div class="link01">
            <a href="/works/">Worksトップへ</a>
          </div>
        </div>

      <?php endwhile; ?>
      <?php endif; ?>

      </div>

    </section>

    <section class="w_full bc_G02 pb_100">
      <div class="layoutTyp06">

        <h2 class="h-sub">Recent Works</h2>

        <div class="layoutTyp06_Inner">
          <?php
          $args = array(
            'post_type'      => 'works',
            'posts_per_page' => 3,
            'post__not_in'   => array($current_post_id),
            'tax_query'      => array(
              array(
                'taxonomy' => 'case_cate',
                'field'    => 'slug',
                'terms'    => $cat_slug_s,
              ),
            ),
          );

          $the_query = new WP_Query($args);
          if ($the_query->have_posts()) :
            while ($the_query->have_posts()) : $the_query->the_post();
          ?>
          <div class="column c-card-tile">
            <a href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail(); ?>
              <p><?php the_title(); ?></p>
            </a>
          </div>
          <?php
            endwhile;
            endif;
            wp_reset_postdata();
          ?>
        </div>

      </div>
    </section>

  </article>
</div>


<link rel="stylesheet" href="<?php echo do_shortcode('[themePass]'); ?>/common/js/lib/slider/jquery.bxslider.css" />
<script type="text/javascript" src="<?php echo do_shortcode('[themePass]'); ?>/common/js/lib/slider/jquery.bxslider.min.js"></script>
<script>
$(function(){
  var w = $(window).width();

  $(window).on({
    load: function () {
      $(".column_MV").animate({ opacity: 1 }, { duration: 500, easing: 'linear' });

      if(w > 767){
        var slider = $('.column_MV').bxSlider({
          auto: true,
          mode: 'horizontal',
          speed: 1000,
          pause: 4000,
          controls: false,
          pager: true,
          minSlides : 1,
          maxSlides : 2,
          slideWidth : 960
        });

        $('.next').on('click', function() {
            slider.goToNextSlide();
        });
        $('.preLink').on('click', function() {
            slider.goToPrevSlide();
        });
      } else {
        $('.column_MV').bxSlider({
          auto: true,
          mode: 'horizontal',
          speed: 1000,
          pause: 4000,
          controls: false,
          pager: true,
        });
      }
    }

  });
});
</script>

<?php get_footer(); ?>
