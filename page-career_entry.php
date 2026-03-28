<?php get_header(); ?>

<div id="mainContents">
  <article class="pt_0">

      <?php
        remove_filter('the_content', 'wpautop');
        the_content();
      ?>

  </article>
</div>



<?php get_footer(); ?>
