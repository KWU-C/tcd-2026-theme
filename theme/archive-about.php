<?php get_header(); ?>

<div id="mainContents">
  <article class="pt_0">

    <section class="w_full bc_G02 pt_50 pb_100">

      <div class="layoutTyp09">
        <ul>
          <li class="active"><a href="/about/">TOP</a></li>
          <?php
          $about_posts = get_posts(array(
            'post_type'      => 'about',
            'posts_per_page' => -1,
            'orderby'        => 'date',
            'order'          => 'ASC',
          ));
          foreach ($about_posts as $p) {
            echo "<li><a href='" . get_permalink($p->ID) . "'>" . esc_html($p->post_title) . "</a></li>";
          }
          ?>
        </ul>
      </div>

      <div class="layoutTyp07">
        <div class="layoutTyp07_Inner">

          <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
            <div class="column">
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail(); ?>
                <h3 class="h-card"><?php the_title(); ?></h3>
              </a>
            </div>
            <?php endwhile; ?>
          <?php endif; ?>

        </div>
      </div>

    </section>

  </article>
</div>

<?php get_footer(); ?>
