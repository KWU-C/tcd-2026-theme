<?php get_header(); ?>

<article id="page" <?php post_class(); ?>>
        <?php
while ( have_posts() ) : the_post();
the_content();
endwhile;
        ?>
</article><!-- #post-## -->


<?php get_footer(); ?>
