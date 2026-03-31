<?php get_header(); ?>

<div id="mainContents">
  <article class="pt_0">

    <section class="w_full bc_G02 pt_50 pb_100">
      <div class="filter-nav">
        <ul>
          <li class="active"><a href="/branding/">All</a></li>
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

      <div class="archive-card-grid">
        <div class="archive-card-grid_Inner">

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

<?php get_footer(); ?>
