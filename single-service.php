<?php get_header(); ?>

<div id="mainContents">
  <article class="pt_0">

    <section class="w_full bc_G02 pt_50 pb_100">

      <div class="filter-nav">
        <ul>
          <?php
          $service_posts = get_posts(array(
            'post_type'      => 'service',
            'posts_per_page' => -1,
            'orderby'        => 'date',
            'order'          => 'DESC',
          ));
          echo "<li><a href='/service/'>TOP</a></li>";
          foreach ($service_posts as $p) {
            $active = ($p->ID === get_the_ID()) ? ' class="active"' : '';
            echo "<li{$active}><a href='" . get_permalink($p->ID) . "'>" . esc_html($p->post_title) . "</a></li>";
          }
          ?>
        </ul>
      </div>

      <div class="layoutTyp08">

        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>

          <div class="layoutTyp08_Title">
            <h1 class="h-page service-title"><?php the_title(); ?></h1>
          </div>

          <div class="layoutTyp08_Inner">
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

    <?php
    $related_cate = get_field('related_works_cate');
    if ($related_cate) :
    ?>
    <section class="w_full bc_G02 pb_100">
      <div class="layoutTyp06">

        <h2 class="h-sub">Related Works</h2>

        <div class="layoutTyp06_Inner">
          <?php
          $args = array(
            'post_type'      => 'works',
            'posts_per_page' => 3,
            'tax_query'      => array(array(
              'taxonomy' => 'case_cate',
              'field'    => 'term_id',
              'terms'    => $related_cate->term_id,
            )),
          );
          $works_query = new WP_Query($args);
          if ($works_query->have_posts()) :
            while ($works_query->have_posts()) : $works_query->the_post();
          ?>
          <div class="column c-card-tile">
            <a href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail(); ?>
              <h4 class="h-label"><?php the_field('works_text01'); ?></h4>
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
    <?php endif; ?>

  </article>
</div>

<?php get_footer(); ?>
