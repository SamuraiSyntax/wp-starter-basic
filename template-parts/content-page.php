<?php

/**
 * Template part pour l'affichage du contenu des pages
 *
 * @package WP_Starter_Basic
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('page-article'); ?>>
  <div class="entry-content">
    <header class="page-header">
      <?php if (has_post_thumbnail()) : ?>
        <div class="page-header__media">
          <?php
          the_post_thumbnail('full', array(
            'class' => 'page-header__image',
            'alt' => get_the_title(),
            'loading' => 'eager',
          ));
          ?>
          <div class="page-header__overlay"></div>
        </div>
      <?php endif; ?>

      <div class="page-header__content">
        <?php the_title('<h1 class="page-title">', '</h1>'); ?>

        <?php if (function_exists('get_field')) : ?>
          <?php if ($page_description = get_field('page_description')) : ?>
            <div class="page-description">
              <?php echo wp_kses_post($page_description); ?>
            </div>
          <?php endif; ?>

          <?php if ($page_cta = get_field('page_cta')) : ?>
            <div class="page-cta">
              <a href="<?php echo esc_url($page_cta['url']); ?>" class="button button--primary"
                <?php echo $page_cta['target'] ? 'target="' . esc_attr($page_cta['target']) . '"' : ''; ?>>
                <?php echo esc_html($page_cta['title']); ?>
              </a>
            </div>
          <?php endif; ?>
        <?php elseif (has_excerpt()) : ?>
          <div class="page-description">
            <?php echo wp_kses_post(get_the_excerpt()); ?>
          </div>
        <?php endif; ?>
      </div>
    </header>

    <?php
    the_content();

    wp_link_pages(array(
      'before' => '<nav class="page-links" aria-label="' . esc_attr__('Navigation des pages', 'wp-starter-basic') . '">',
      'after'  => '</nav>',
      'link_before' => '<span class="page-number">',
      'link_after'  => '</span>',
    ));
    ?>
  </div>

  <?php if (get_edit_post_link()) : ?>
    <footer class="entry-footer">
      <?php
      edit_post_link(
        sprintf(
          wp_kses(
            __('Modifier <span class="screen-reader-text">%s</span>', 'wp-starter-basic'),
            array('span' => array('class' => array()))
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