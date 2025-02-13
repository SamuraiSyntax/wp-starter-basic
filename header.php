<?php

/**
 * L'en-tête du thème
 *
 * @package WP_Starter_Basic
 * @since 1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary">
      <?php esc_html_e('Aller au contenu', 'wp-starter-basic'); ?>
    </a>

    <header class="site-header" id="masthead">
      <div class="site-header__container container">
        <div class="site-header__branding">
          <?php if ($logo = get_theme_mod('wp_starter_basic_logo')) : ?>
            <div class="site-header__logo">
              <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                <img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('name'); ?>" width="150" height="50"
                  loading="eager">
              </a>
            </div>
          <?php endif; ?>

          <div class="site-header__titles">
            <?php if (is_front_page() && is_home()) : ?>
              <h1 class="site-header__title">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                  <?php bloginfo('name'); ?>
                </a>
              </h1>
            <?php else : ?>
              <p class="site-header__title">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                  <?php bloginfo('name'); ?>
                </a>
              </p>
            <?php endif; ?>

            <?php
            $description = get_bloginfo('description', 'display');
            if ($description || is_customize_preview()) :
            ?>
              <p class="site-header__description">
                <?php echo $description; ?>
              </p>
            <?php endif; ?>
          </div>
        </div>

        <button class="site-nav__toggle" aria-controls="primary-menu" aria-expanded="false">
          <span class="site-nav__toggle-icon">
            <span class="site-nav__toggle-line"></span>
            <span class="site-nav__toggle-line"></span>
            <span class="site-nav__toggle-line"></span>
          </span>
          <span class="screen-reader-text">
            <?php esc_html_e('Menu', 'wp-starter-basic'); ?>
          </span>
        </button>

        <nav class="site-nav" id="site-navigation"
          aria-label="<?php esc_attr_e('Menu principal', 'wp-starter-basic'); ?>">
          <?php if (has_nav_menu('primary')) : ?>
            <?php
            wp_nav_menu(array(
              'theme_location' => 'primary',
              'menu_id'        => 'primary-menu',
              'container'      => false,
              'menu_class'     => 'site-nav__menu',
              'fallback_cb'    => false,
              'items_wrap'     => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
            ));
            ?>
          <?php else : ?>
            <ul class="site-nav__menu">
              <?php wp_list_pages(array(
                'title_li' => false,
                'depth'    => 1,
              )); ?>
            </ul>
          <?php endif; ?>
        </nav>
      </div>
    </header>

    <div id="content" class="site-content">