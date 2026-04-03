<?php get_header(); ?>

<div id="mainContents">
  <article class="pt_0">

    <section class="w_full bc_G02 pt_50 pb_100">

      <div class="filter-nav">
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

      <div class="article-shell">

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

          <div class="article-shell_Title pt_100">
            <p><?php the_time('Y.m.d'); ?></p>
            <h1 class="h-page"><?php echo $page_title; ?></h1>
          </div>

          <div class="article-shell_Inner">
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
          <div class="article-shell_bottom">
            <h2 class="h-sub">筆者の最近の記事</h2>
            <div class="article-shell_link01">
              <a href="/branding/magazine_cate/<?php echo $cat_slug ?>/">一覧へ</a>
            </div>
            <div class="article-shell_List">
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

          <div class="article-shell_Sns">
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

    <section class="w_full bc_G02 pt_50 pb_100">
      <div class="content-card-grid">

        <h2 class="h-sub typ02">こちらの記事もよく読まれています</h2>

        <div class="content-card-grid_Inner">
          <?php
          $related_args = array(
            'post_type'      => 'branding',
            'posts_per_page' => 3,
            'post__not_in'   => array(get_the_ID()),
            'orderby'        => 'date',
            'order'          => 'DESC',
          );
          $related_query = new WP_Query($related_args);
          if ($related_query->have_posts()) :
            while ($related_query->have_posts()) : $related_query->the_post();
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


    <?php if(get_field('works01')): ?>
    <section class="w_full bc_G02 pb_100">
      <div class="archive-card-grid">
        <h2 class="h-sub typ02">関連するTCDの実績</h2>
        <div id="worksData" class="archive-card-grid_Inner pt_30"></div>
      </div>
    </section>
    <?php endif; ?>

  </article>
</div>





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
