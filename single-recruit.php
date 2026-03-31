<?php get_header(); ?>

<div id="mainContents">
  <article class="pt_0">

    <section class="w_full bc_G02 pt_50 pb_100">

      <div class="filter-nav">
        <ul>
          <?php
          $recruit_posts = get_posts(array(
            'post_type'      => 'recruit',
            'posts_per_page' => -1,
            'orderby'        => 'date',
            'order'          => 'DESC',
            'post_parent'    => 0,
          ));
          echo "<li><a href='/recruit/'>TOP</a></li>";
          foreach ($recruit_posts as $p) {
            $active = ($p->ID === get_the_ID()) ? ' class="active"' : '';
            echo "<li{$active}><a href='" . get_permalink($p->ID) . "'>" . esc_html($p->post_title) . "</a></li>";
          }
          ?>
        </ul>
      </div>

      <div class="article-shell">

        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>

          <div class="article-shell_Title">
            <h1 class="h-page"><?php the_title(); ?></h1>
          </div>

          <div class="article-shell_Inner">
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

<?php get_footer(); ?>
