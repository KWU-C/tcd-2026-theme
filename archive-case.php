<?php get_header(); ?>

<div class="wrapper">

    <article class="works-cate">

      <div class="sub-nav">
        <ul class="menu5 clearfix">
          <li><a href="/case/branding/">企業ブランディング</a></li>
          <li><a href="/case/package/">商品ブランデング</a></li>
          <li><a href="/case/product/">プロダクトデザイン</a></li>
          <li><a href="/case/promotion/">ブランド・プロモーション</a></li>
          <li><a href="/case/naming_company/">ネーミング</a></li>
        </ul>
      </div>

      <div class="_c-container">
        <div class="_c-row _c-row--md-fill">

          <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
            <div class="_c-row__col _c-row__col--1-1 _c-row__col--md-1-3">
              <div class="thum">
                <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail(); ?>
                  <span class="ttl"><?php the_title(); ?></span>
                </a>
              </div>
            </div>
            <?php endwhile; ?>
          <?php endif; ?>

        </div>
      </div>

    </article>

</div>
<?php get_footer(); ?>
