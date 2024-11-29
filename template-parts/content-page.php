<?php

/**
 * Template part pour l'affichage des pages
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
  </header>

  <?php wp_starter_basic_post_thumbnail(); ?>

  <div class="entry-content">
    <?php
    the_content();

    wp_link_pages(
      array(
        'before' => '<div class="page-links">' . esc_html__('Pages:', 'wp-starter-basic'),
        'after'  => '</div>',
      )
    );
    ?>
  </div>

  <?php if (get_edit_post_link()) : ?>
  <footer class="entry-footer">
    <?php
      edit_post_link(
        sprintf(
          wp_kses(
            __('Modifier <span class="screen-reader-text">%s</span>', 'wp-starter-basic'),
            array(
              'span' => array(
                'class' => array(),
              ),
            )
          ),
          wp_kses_post(get_the_title())
        ),
        '<span class="edit-link">',
        '</span>'
      );
      ?>
  </footer>
  <?php endif; ?>
</article>