<?php

/**
 * Template part pour l'affichage des articles
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <?php
    if (is_singular()) :
      the_title('<h1 class="entry-title">', '</h1>');
    else :
      the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
    endif;

    if ('post' === get_post_type()) :
    ?>
    <div class="entry-meta">
      <?php wp_starter_basic_posted_on();
        wp_starter_basic_posted_by(); ?>
    </div>
    <?php endif; ?>
  </header>

  <?php wp_starter_basic_post_thumbnail(); ?>

  <div class="entry-content">
    <?php the_content(
      sprintf(
        wp_kses(
          __('Continuer la lecture<span class="screen-reader-text"> de "%s"</span>', 'wp-starter-basic'),
          array(
            'span' => array(
              'class' => array(),
            ),
          )
        ),
        wp_kses_post(get_the_title())
      )
    );

    wp_link_pages(
      array(
        'before' => '<div class="page-links">' . esc_html__('Pages:', 'wp-starter-basic'),
        'after'  => '</div>',
      )
    ); ?>
  </div>

  <footer class="entry-footer">
    <?php wp_starter_basic_entry_footer(); ?>
  </footer>
</article>