<?php

/**
 * L'en-tête du thème
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary">
      <?php esc_html_e('Aller au contenu', 'wp-starter-basic'); ?>
    </a>

    <header id="masthead" class="site-header">
      <div class="site-branding">
        <?php if ($logo = get_theme_mod('wp_starter_basic_logo')) : ?>
        <div class="site-logo">
          <a href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('name'); ?>">
          </a>
        </div>
        <?php endif; ?>

        <div class="site-title-group">
          <?php if (is_front_page() && is_home()) : ?>
          <h1 class="site-title">
            <?php else : ?>
            <p class="site-title">
              <?php endif; ?>
              <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                <?php bloginfo('name'); ?>
              </a>
              <?php if (is_front_page() && is_home()) : ?>
          </h1>
          <?php else : ?>
          </p>
          <?php endif; ?>

          <?php if ($description = get_bloginfo('description', 'display')) : ?>
          <p class="site-description"><?php echo $description; ?></p>
          <?php endif; ?>
        </div>
      </div>

      <nav id="site-navigation" class="main-navigation">
        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
          <span class="menu-toggle-text"><?php esc_html_e('Menu', 'wp-starter-basic'); ?></span>
        </button>
        <?php
        wp_nav_menu(array(
          'theme_location' => 'primary',
          'menu_id'        => 'primary-menu',
          'container'      => false,
          'menu_class'     => 'nav-menu',
          'fallback_cb'    => false,
        ));
        ?>
      </nav>
    </header>