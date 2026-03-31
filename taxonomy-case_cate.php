<?php get_header(); ?>

<div id="mainContents">
  <article class="pt_0">

    <section class="w_full bc_G02 pt_50 pb_100">

      <?php
      $current_term = get_queried_object();
      $current_slug = $current_term->slug;
      ?>

      <div class="filter-nav">
        <ul>
          <li<?php echo ($current_slug == 'top') ? ' class="active"' : ''; ?>><a href="/works/">TOP</a></li>
          <?php
          $case_terms = get_terms(array(
            'taxonomy'   => 'case_cate',
            'hide_empty' => true,
            'exclude'    => array(get_term_by('slug', 'top', 'case_cate')->term_id),
          ));
          foreach ($case_terms as $term) {
            $active = ($current_slug === $term->slug) ? ' class="active"' : '';
            echo "<li{$active}><a href='" . get_term_link($term) . "'>" . esc_html($term->name) . "</a></li>";
          }
          ?>
        </ul>
      </div>

      <div class="worksTyp02">
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>
          <div class="column c-card-tile">
            <a href="<?php the_permalink(); ?>">
              <div class="over filter">
                <?php the_post_thumbnail(); ?>
              </div>
              <p><?php the_field('works_text01'); ?></p>
              <h3 class="h-card"><?php the_title(); ?></h3>
            </a>
          </div>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>

    </section>

  </article>
</div>

<?php get_footer(); ?>
