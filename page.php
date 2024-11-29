<?php
get_header();
?>

<main id="primary" class="site-main">
  <?php
  while (have_posts()) :
    the_post();
    get_template_part('template-parts/content', 'page');

    // Si les commentaires sont ouverts ou si nous avons au moins un commentaire, chargez le template des commentaires.
    if (comments_open() || get_comments_number()) :
      comments_template();
    endif;
  endwhile;
  ?>
</main>

<?php
get_sidebar();
get_footer();