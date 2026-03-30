<?php get_header(); ?>

<div id="mainContents">
  <article class="pt_0">

    <section class="w_full bc_G02 pt_50 pb_100">

      <div class="layoutTyp09">
        <ul>
          <li><a href="/branding/">All</a></li>
          <?php
          $term_list = get_terms('magazine_tag');
          $result_list = [];
          foreach ($term_list as $term) {
            $u = (get_term_link( $term, 'magazine_tag' ));
            echo "<li><a href='".$u."'>".$term->name."</a></li>";
          }
          ?>
        </ul>
      </div>

      <div class="layoutTyp08">

      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

          <?php
          $page_title = get_the_title();
          $page_title = preg_replace('/\|/', "<br />", $page_title);

          $terms = get_the_terms($post->ID,'magazine_cate');
          foreach( $terms as $term ) {
            $cat_id   = $term->term_id;
            $cat_slug = $term->slug;
            $cat_name = $term->name;
            $staff_img = get_field('staff_img', $term);
            $staff_post = get_field('staff_post', $term);
            $cat_description = $term->description;
          }
          ?>

          <div class="layoutTyp08_Title pt_100">
            <p><?php the_time('Y.m.d'); ?></p>
            <h1 class="h-page"><?php echo $page_title; ?></h1>
          </div>

          <div class="layoutTyp08_Inner">
            <div class="detail__main_cont">

              <?php
                if ( $cat_slug == "03-news" || $cat_slug == "tcdcrew" || $cat_slug == "02-column" || $cat_slug == "06-focus" ) { }
                else {
              ?>
              <p class="writer"><img src="<?php echo $staff_img; ?>" /><small><?php echo $cat_name; ?>　<?php echo $staff_post; ?></small></p>
              <?php } ?>

              <?php the_content();?>


              <?php
                if ( $cat_slug == "03-news" || $cat_slug == "tcdcrew" || $cat_slug == "02-column" || $cat_slug == "06-focus" ) { }
                else {
              ?>
              <div class="profileType01">
                <p class="text01">［筆者プロフィール］</p>
                  <h3 class="h-sub"><?php echo $cat_name; ?></h3>
                  <p class="h-label"><?php echo $staff_post; ?></p>
                  <p class="text02"><?php echo $cat_description; ?></p>
              </div>
              <?php } ?>

            </div>
          </div>

          <?php
            if ( $cat_slug == "people" ) { }
            else {
          ?>
          <div class="layoutTyp08_bottom">
            <h2 class="h-sub">筆者の最近の記事</h2>
            <div class="layoutTyp08_link01">
              <a href="/branding/magazine_cate/<?php echo $cat_slug ?>/">一覧へ</a>
            </div>
            <div class="layoutTyp08_List">
              <ul>


                <?php
                $custom_posts = get_posts(array(
                  'post_type' => 'branding',
                  'posts_per_page' => 5,
                  'tax_query' => array(
                  array(
                    'taxonomy' => 'magazine_cate',
                    'field' => 'slug',
                    'terms' => $cat_slug
                    )
                  )
                ));

                global $post;
                if($custom_posts): foreach($custom_posts as $post): setup_postdata($post); ?>

                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

                <?php
                endforeach;
                wp_reset_postdata();
                endif;
                ?>
              </ul>
            </div>
          </div>
          <?php
            }
          ?>

          <div class="layoutTyp08_Sns">
            <a target="_blank" href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php echo strip_tags($page_title); ?>" target="_blank">
              <img src="/wp-content/themes/tcd/common/img/branding/branding_sns01.svg" alt="twitter">
            </a>

            <a target="_blank" href="https://www.facebook.com/share.php?u=<?php the_permalink(); ?>">
              <img src="/wp-content/themes/tcd/common/img/branding/branding_sns02.svg" alt="facebook">
            </a>
          </div>

        <?php endwhile; ?>
      <?php endif; ?>
      </div>

    </section>

    <section class="w_full bc_G02 pb_100">
      <div class="layoutTyp07">

        <h2 class="h-sub typ02">こちらの記事もよく読まれています</h2>

        <div class="layoutTyp07_Inner">

          <div id="brandingMv">

            <div class="column c-card-tile">
              <a href="/branding/ikuyama/marketing_basic_knowledge03.html">
              <img width="333" height="167" src="/wp-content/uploads/sites/3/2021/08/marketing_basic_knowledge03_thumb.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" srcset="/wp-content/uploads/sites/3/2021/08/marketing_basic_knowledge03_thumb.jpg 333w, /branding/wp-content/uploads/sites/3/2021/08/marketing_basic_knowledge03_thumb-300x150.jpg 300w" sizes="(max-width: 333px) 85vw, 333px">
              <h3>今さら聞けない！マーケティングの基礎知識<br>消費者行動研究としての「ライフステージ論」の 有効性を検証する</h3>
              <p>シリーズ企画「今さら聞けない！マーケティングの基礎知識」も第3回目。……続きを読む</p>
              </a>
            </div>

            <div class="column c-card-tile">
              <a href="/branding/03-news/nomen_interview01.html">
              <img width="333" height="167" src="/wp-content/uploads/sites/3/2021/08/nomen_thumbnail_0128.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" srcset="/wp-content/uploads/sites/3/2021/08/nomen_thumbnail_0128.jpg 333w, /branding/wp-content/uploads/sites/3/2021/08/nomen_thumbnail_0128-300x150.jpg 300w" sizes="(max-width: 333px) 85vw, 333px">
              <h3>TCDの海外パートナー、フランスのネーミング会社 Nomen CEO マルセロ バトン氏 インタビュー</h3>
              <p>TCDは2020年、ネーミング作成のグローバル対応力を強化するため、……続きを読む</p>
              </a>
            </div>

            <div class="column c-card-tile">
              <a href="/branding/yamazaki/pkg_design2.html">
              <img width="330" height="165" src="/wp-content/uploads/sites/3/2015/10/sum_pkg_design2.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" srcset="/wp-content/uploads/sites/3/2015/10/sum_pkg_design2.jpg 330w, /branding/wp-content/uploads/sites/3/2015/10/sum_pkg_design2-300x150.jpg 300w" sizes="(max-width: 330px) 85vw, 330px">
              <h3>競合に勝つパッケージデザイン開発のために<br>商品ブランディング考＜Part2＞</h3>
              <p>こちらの連載では、商品パッケージデザインの役割と商品ブランディング事……続きを読む</p>
              </a>
            </div>

            <div class="column c-card-tile">
              <a href="/branding/yamazaki/brandprocess_1.html">
              <img width="690" height="365" src="/wp-content/uploads/sites/3/2017/05/brandprocess_1_img1-2.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" srcset="/wp-content/uploads/sites/3/2017/05/brandprocess_1_img1-2.jpg 690w, /branding/wp-content/uploads/sites/3/2017/05/brandprocess_1_img1-2-300x159.jpg 300w" sizes="(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px">
              <h3>「商品」を「ブランド」へと成長させるためのプロセス <br>〜商品ブランドデザイン開発について〜＜Part1＞</h3>
              <p>こちらの連載では、3回に分けて商品ブランドデザイン開発（商品ブランデ……続きを読む</p>
              </a>
            </div>

            <div class="column c-card-tile">
              <a href="/branding/kawauchi/brandmanager_06.html">
              <img width="333" height="167" src="/wp-content/uploads/sites/3/2020/05/brandmanager6_thum.png" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" srcset="/wp-content/uploads/sites/3/2020/05/brandmanager6_thum.png 333w, /branding/wp-content/uploads/sites/3/2020/05/brandmanager6_thum-300x150.png 300w" sizes="(max-width: 333px) 85vw, 333px">
              <h3>ブランド・マネージャーの仕事⑥<br>経営の武器としての「デザイン」</h3>
              <p>◼️イチから始める「ブランディング」当コラムでは、大手企業に限らず「……続きを読む</p>
              </a>
            </div>

            <div class="column c-card-tile">
              <a href="/branding/yamazaki/new_normal.html">
              <img width="690" height="345" src="/wp-content/uploads/sites/3/2020/04/column_yamasaki_thumb.gif" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="">
              <h3>Think about ”DESIGN”<br>現代のデザイナーに求められる、<br>「デザインすること以外の価値」とは</h3>
              <p>ブランドは「モノ」ではなく「魅力のあるコトを生み出す」存在へ ブラン……続きを読む</p>
              </a>
            </div>

          <?php /*
          global $post;
          switch_to_blog(3);
          $args = array(
            'numberposts' => 6,
            'post_type' => 'post'
          );
          $postlist = get_posts($args);
          if($postlist): foreach($postlist as $post): setup_postdata($post);
          ?>
            <div class="column c-card-tile">
              <a href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail(); ?>
                <h3><?php the_title(); ?></h3>
                <p><?php echo wp_trim_words(get_the_content(), 34, '……続きを読む' ); ?></p>
              </a>
            </div>
          <?php endforeach; endif;
          wp_reset_postdata();
          restore_current_blog();
          */ ?>
          </div>

        </div>

      </div>

    </section>


    <?php if(get_field('works01')): ?>
    <section class="w_full bc_G02 pb_100">
      <div class="layoutTyp07">
        <h2 class="h-sub typ02">関連するTCDの実績</h2>
        <div id="worksData" class="layoutTyp07_Inner pt_30"></div>
      </div>
    </section>
    <?php endif; ?>

  </article>
</div>


<link rel="stylesheet" href="<?php echo do_shortcode('[themePass]'); ?>/common/js/lib/slider/jquery.bxslider.css" />
<script type="text/javascript" src="<?php echo do_shortcode('[themePass]'); ?>/common/js/lib/slider/jquery.bxslider.min.js"></script>
<script>
jQuery(function($){
  $(function(){
    $(window).load(function(){
      var winW = $(window).width();
      //スライド
      $("#brandingMv").animate({ opacity: 1 }, { duration: 500, easing: 'linear' });
      if(winW > 767){
        $("#brandingMv").bxSlider({
          auto: true,
          speed: 1000,
          pause: 5000,
          slideWidth: 346,
          slideMargin: 81,
          minSlides: 1,
          maxSlides: 3,
          controls: false,
          pager: false
        });
      } else {
      }
    });
  });
});
</script>



<?php if(get_field('works01')): ?>
<script>
$(function() {
  $.getJSON("/wp-json/wp/v2/works/<?php the_field('works01'); ?>" , function(data) {
    var count = 30;
    var thisText = $(data.content.rendered).text();
    var textLength = thisText.length;
    if (textLength > count) {
      var showText = thisText.substring(0, count);
      var insertText = showText += "……続きを読む";
    };
    $("#worksData").append('<div class="column"><a href="'+ data.link +'"><img src="'+ data.thumbnail.url +'" /><h3>'+ data.title.rendered +'</h3><p>'+ insertText +'</p></a></div>');
  });

  <?php if(get_field('works02')): ?>
  $.getJSON("/wp-json/wp/v2/works/<?php the_field('works02'); ?>" , function(data) {
    var count = 30;
    var thisText = $(data.content.rendered).text();
    var textLength = thisText.length;
    if (textLength > count) {
      var showText = thisText.substring(0, count);
      var insertText = showText += "……続きを読む";
    };
    $("#worksData").append('<div class="column"><a href="'+ data.link +'"><img src="'+ data.thumbnail.url +'" /><h3>'+ data.title.rendered +'</h3><p>'+ insertText +'</p></a></div>');
  });
  <?php endif; ?>

  <?php if(get_field('works03')): ?>
  $.getJSON("/wp-json/wp/v2/works/<?php the_field('works03'); ?>" , function(data) {
    var count = 30;
    var thisText = $(data.content.rendered).text();
    var textLength = thisText.length;
    if (textLength > count) {
      var showText = thisText.substring(0, count);
      var insertText = showText += "……続きを読む";
    };
    $("#worksData").append('<div class="column"><a href="'+ data.link +'"><img src="'+ data.thumbnail.url +'" /><h3>'+ data.title.rendered +'</h3><p>'+ insertText +'</p></a></div>');
  });
  <?php endif; ?>
});
</script>
<?php endif; ?>

<?php get_footer(); ?>
