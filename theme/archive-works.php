<?php
	wp_redirect( '/works/top/' );
	exit;
?>

<?php get_header(); ?>

<div id="mainContents">

  <section>

    <div class="worksTyp01">
      <ul>
        <li class="active"><a href="/works/">TOP</a></li>
        <li><a href="/works/corporate/">企業ブランディング</a></li>
        <li><a href="/works/product/">商品ブランデング</a></li>
        <li><a href="/works/service/">サービスブランディング</a></li>
        <li><a href="/works/promotion/">ブランドプロモーション</a></li>
        <li><a href="/works/industrial/">プロダクトデザイン</a></li>
        <li><a href="/works/digital/">デジタルデザイン</a></li>
        <li><a href="/works/naming_company/">ネーミング</a></li>
      </ul>
    </div>

    <div class="worksTyp02">

      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
        <div class="column c-card-tile">
          <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail(); ?>
            <p><?php the_field('works_text01'); ?></p>
            <h3><?php the_title(); ?></h3>
          </a>
        </div>
        <?php endwhile; ?>
      <?php endif; ?>

    </div>

    <?php if (function_exists('pagination')) {
      pagination( $wp_query->max_num_pages, get_query_var( 'paged' ) );
    } ?>

  </section>
</div>

<?php get_footer(); ?>
