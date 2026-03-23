<?php get_header(); ?>

<div id="mainContents">
  <article class="pt_0">

    <section class="w_full pt_130 pb_130">
      <div class="layoutTyp03">
        <h2 class="h-label">TCDのブランディングサービス</h2>
        <h3 class="h-display">Branding Services</h3>

        <div class="columnBox service-tiles">
          <?php
          $service_posts = get_posts(array(
            'post_type'      => 'service',
            'posts_per_page' => -1,
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
          ));
          foreach ($service_posts as $p) :
            $excerpt = has_excerpt($p->ID)
              ? get_the_excerpt($p)
              : wp_trim_words(strip_tags(get_post_field('post_content', $p->ID)), 20, '');
          ?>
          <div class="column">
            <a href="<?php echo get_permalink($p->ID); ?>">
              <h4 class="h-section"><?php echo esc_html($p->post_title); ?></h4>
              <?php if ($excerpt) : ?>
                <p><?php echo esc_html($excerpt); ?></p>
              <?php endif; ?>
            </a>
          </div>
          <?php endforeach; ?>
        </div>

      </div>
    </section>

  </article>
</div>

<?php get_footer(); ?>
