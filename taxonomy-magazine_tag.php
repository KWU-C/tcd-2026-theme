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

      <div class="layoutTyp07">
        <div class="layoutTyp07_Inner">

          <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
            <div class="column c-card-tile">
              <a href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail(); ?>
                <h3 class="h-card"><?php the_title(); ?></h3>
                <p><?php echo wp_trim_words(get_the_content(), 34, '……続きを読む' ); ?></p>
              </a>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>

        </div>

        <?php /* 旧ページネーション
        <div id="tcd">
          <?php page_nav( 'nav-below' ); ?>
        </div>
        */ ?>

        <?php /*
        if (function_exists('my_pagination')) {
          my_pagination($additional_loop->max_num_pages);
        }
        */ ?>

        <?php if (function_exists('pagination')) {
          pagination( $wp_query->max_num_pages, get_query_var( 'paged' ) );
        } ?>

      </div>

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

    </section>

  </article>
</div>

<script>
$(function(){
  //タグ表示のアクティブ対応
  var tagURL = location.pathname;
  var tagName = tagURL.replace("/branding/","");
  var tagName_A = decodeURIComponent(tagName);
  var tagName_B = tagName_A.replace("/","");
  if(tagName_B != "/branding/"){
    $(".filter-nav li").removeClass("active");
    $(".filter-nav li").each(function(index, el) {
      var listName = $(this).find("a").text();
      console.log(tagName_B +":"+ listName);
      if(tagName_B == listName){
        $(this).addClass("active");
      }
    });
  }else{
    $(".filter-nav li:first").addClass("active");
  }
});
</script>
<?php get_footer(); ?>
