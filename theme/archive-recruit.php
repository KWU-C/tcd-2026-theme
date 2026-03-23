<?php get_header(); ?>

<div id="mainContents">
  <article class="pt_0">

    <section class="w_full bc_G02 pt_50 pb_100">

      <div class="layoutTyp09">
        <ul>
          <li class="active"><a href="/recruit/">TOP</a></li>
          <?php
          $recruit_posts = get_posts(array(
            'post_type'      => 'recruit',
            'posts_per_page' => -1,
            'orderby'        => 'date',
            'order'          => 'ASC',
            'post_parent'    => 0,
          ));
          foreach ($recruit_posts as $p) {
            echo "<li><a href='" . get_permalink($p->ID) . "'>" . esc_html($p->post_title) . "</a></li>";
          }
          ?>
        </ul>
      </div>

      <div class="layoutTyp07">
        <div class="layoutTyp07_Inner">

          <?php
          $top_posts = new WP_Query(array(
            'post_type'      => 'recruit',
            'posts_per_page' => -1,
            'orderby'        => 'date',
            'order'          => 'ASC',
            'post_parent'    => 0,
          ));
          while ($top_posts->have_posts()) : $top_posts->the_post(); ?>
          <div class="column">
            <a href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail(); ?>
              <h3 class="h-card"><?php the_title(); ?></h3>
            </a>
          </div>
          <?php endwhile; wp_reset_postdata(); ?>

        </div>
      </div>

    </section>

  </article>
</div>

<?php get_footer(); ?>
