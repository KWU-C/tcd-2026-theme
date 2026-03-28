<?php get_header(); ?>

<div id="topMv">
  <div class="videoArea">
    <video muted loop autoplay playsinline>
    <source src='<?php echo do_shortcode('[themePass]'); ?>/common/movie/tcd_pc.mp4' type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
    <p>動画を再生するには、videoタグをサポートしたブラウザが必要です。</p>
    </video>
  </div>
  
  <div class="videoArea_Sp">
    <video muted loop autoplay playsinline>
    <source src='<?php echo do_shortcode('[themePass]'); ?>/common/movie/tcd_mobile.mp4' type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
    <p>動画を再生するには、videoタグをサポートしたブラウザが必要です。</p>
    </video>
  </div>
</div>




<div id="mainContents" class="pt_0">
  <article class="pt_0">
    
    <section class="w_full pt_60 pb_60">
      <div class="layoutTyp03">
        <h2 class="h-label">TCDのブランディングサービス</h2>
        <h3 class="h-display">Branding Services</h3>
        
        <div class="columnBox">
          <?php
          $service_posts = get_posts(array(
            'post_type'      => 'service',
            'posts_per_page' => -1,
            'orderby'        => 'date',
            'order'          => 'DESC',
          ));
          foreach ($service_posts as $p) :
            $excerpt = has_excerpt($p->ID)
              ? get_the_excerpt($p)
              : wp_trim_words(strip_tags(get_post_field('post_content', $p->ID)), 20, '');
          ?>
          <div class="column">
            <a class="c-card-tile" href="<?php echo get_permalink($p->ID); ?>">
              <h3 class="h-section"><?php echo esc_html($p->post_title); ?></h3>
              <?php if ($excerpt) : ?>
                <p><?php echo esc_html($excerpt); ?></p>
              <?php endif; ?>
            </a>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>


        
        <section class="w_full bc_G03 pb_100">
          <div class="layoutTyp02">
            <h2 class="h-hero">経営に、デザインの力を。</h2>
            <p>50年の実績を支える「デザイン力」<br />
              100業種を超える経験で培った「仮説構築力」<br />
            スピーディに視覚化し、検証を行う「実行力」</p>
            
            <p>課題の本質を捉え、デザインの力で経営課題を解決する。<br />
              TCDは、経営パートナーとして伴走しながら<br />
            企業が進むべき未来を描いていきます。</p>
          </div>
        </section>


    
    <div id="mainContents" class="pt_0">
      <article class="pt_0">
        
        

    <section class="w_full pt_100">
      <div class="layoutTyp04">
        <h2 class="h-label">ブランディング実績</h2>
        <h3 class="h-display">Branding Works</h3>
        
        <div class="layoutTyp04_Inner">
        
          <div class="column c-card-tile">
            <a href="/works/corporate/nitto.html">
              <img src="/wp-content/uploads/2022/08/nitto_thum.jpg" alt="" />
              <h4 class="h-label">日東電工株式会社 [大阪]</h4>
              <p>創業100周年へ向けた新たな挑戦、ニットーのブランディング</p>
            </a>
          </div>

          <div class="column c-card-tile">
            <a href="/works/product/kakitane.html">
              <img src="/wp-content/uploads/2022/06/kakitane_thumb-1.jpg" alt="" />
              <h4 class="h-label">とよす株式会社 [大阪]</h4>
              <p>日本初・柿の種専門店、かきたねキッチンのブランディング</p>
            </a>
          </div>

          <div class="column c-card-tile">
            <a href="/works/corporate/nobori_ltd.html">
              <img src="/wp-content/uploads/2022/08/nobori_thum.jpg" alt="" />
              <h4 class="h-label">PSP株式会社 [東京]</h4>
              <p>医療情報共有サービス「NOBORI（ノボリ）」のブランディング</p>
            </a>
          </div>

        </div>

      </div>
    </section>


    <section class="w_full pt_130 pb_150">
      <div class="layoutTyp06">
        <h2 class="h-label">ブランディングコラム</h2>
        <h3 class="h-display">Branding Magazine</h3>

        <div class="layoutTyp06_Inner">

          <?php
          $args = array(
            'post_type' => 'branding',
            'posts_per_page' => 6
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

        <div class="linkTyp01">
          <a href="/branding">一覧を見る</a>
        </div>
      </div>

    </section>


    <section id="p07" class="w_full bc_G03 pb_150">
      <div class="layoutTyp10">
        <h2 class="h-label">東京・大阪を中心に全国対応可能です</h2>
        <h3 class="h-display">Access</h3>

        <div class="layoutTyp10_Inner">

          <div class="column">
            <h3 class="h-section pb_30">東京支社</h3>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3241.400521643831!2d139.7630697757871!3d35.66713877259182!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188bdd84261e5f%3A0x4f8bc30f34032f62!2z44CSMTA0LTAwNjEg5p2x5Lqs6YO95Lit5aSu5Yy66YqA5bqn77yX5LiB55uu77yR77yW4oiS77yS77yR!5e0!3m2!1sja!2sjp!4v1719191157399!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <h2 class="h-card">東京を中心とした東日本エリアの窓口</h2>
            <p>東京都中央区銀座7-16-21　銀座木挽ビル7F<br>
            Tel：03-6263-8330</p>
          </div>

          <div class="column">
            <h3 class="h-section pb_30">芦屋本社</h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3278.8584186594935!2d135.31448331563135!3d34.73396298042598!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6000f2dd0e04607b%3A0x9a844ac1fb2afdbe!2z77yI5qCq77yJ77y077yj77yk!5e0!3m2!1sja!2sjp!4v1613371111372!5m2!1sja!2sjp" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            <h2 class="h-card">大阪・兵庫を中心とした西日本エリアの窓口</h2>
            <p>兵庫県芦屋市春日町7-19　TCDビル<br>
            Tel：0797-34-4300</p>
          </div>

        </div>
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
    //スライド
    $(".layoutTyp03_Mv").animate({ opacity: 1 }, { duration: 500, easing: 'linear' });
    if(winW > 767){
      $(".layoutTyp03_Mv").bxSlider({
        auto: true,
        speed: 1000,
        pause: 4000,
        slideMargin: 25,
        controls: false,
        pager: true
      });
    } else {
      $(".layoutTyp03_Mv").bxSlider({
        auto: true,
        speed: 1000,
        pause: 4000,
        controls: false,
        pager: true
      });
    }
  });
});
</script>


<?php get_footer(); ?>
