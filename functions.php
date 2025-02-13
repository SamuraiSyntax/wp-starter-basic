<?php
if (!defined('ABSPATH')) {
  exit;
}

// Configuration du thème
if (!function_exists('wp_starter_basic_setup')):
  function wp_starter_basic_setup()
  {
    // Support des traductions
    load_theme_textdomain('wp-starter-basic', get_template_directory() . '/languages');

    // Support des fonctionnalités WordPress
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
      'style',
      'script'
    ));
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('editor-styles');
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
    add_theme_support('responsive-embeds');

    // Menu de navigation
    register_nav_menus(array(
      'primary' => esc_html__('Menu Principal', 'wp-starter-basic'),
      'footer' => esc_html__('Menu Footer', 'wp-starter-basic')
    ));
  }
endif;
add_action('after_setup_theme', 'wp_starter_basic_setup');

// Support RTL
add_action('after_setup_theme', function () {
  add_theme_support('rtl-language-support');
});

// Enregistrement des scripts et styles
function wp_starter_basic_scripts()
{
  // Charger le style principal compilé
  wp_enqueue_style(
    'wp-starter-basic-main-style',
    get_template_directory_uri() . '/assets/css/style.css',
    array(),
    wp_get_theme()->get('Version')
  );

  // Charger le script principal
  wp_enqueue_script(
    'wp-starter-basic-main',
    get_template_directory_uri() . '/assets/js/main.js',
    array(),
    wp_get_theme()->get('Version'),
    true
  );

  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}
add_action('wp_enqueue_scripts', 'wp_starter_basic_scripts');

// Ajout après wp_starter_basic_scripts()
function wp_starter_basic_widgets_init()
{
  register_sidebar(array(
    'name'          => esc_html__('Sidebar Principal', 'wp-starter-basic'),
    'id'            => 'sidebar-1',
    'description'   => esc_html__('Ajoutez vos widgets ici.', 'wp-starter-basic'),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ));
}
add_action('widgets_init', 'wp_starter_basic_widgets_init');

// Inclure les fichiers additionnels
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/customizer.php';

/**
 * Vérifie les dépendances du thème
 */
function wp_starter_basic_check_dependencies()
{
  $notices = array();

  // Vérifie si ACF est actif
  if (!class_exists('ACF') && !function_exists('get_field')) {
    $notices[] = sprintf(
      /* translators: %s: lien vers la page des plugins */
      __('Le thème recommande l\'installation du plugin <a href="%s">Advanced Custom Fields</a> pour toutes les fonctionnalités.', 'wp-starter-basic'),
      admin_url('plugin-install.php?s=advanced-custom-fields&tab=search&type=term')
    );
  }

  // Vérifie si Yoast SEO est actif
  if (!function_exists('yoast_breadcrumb')) {
    $notices[] = sprintf(
      /* translators: %s: lien vers la page des plugins */
      __('Pour une meilleure navigation, installez <a href="%s">Yoast SEO</a> ou un autre plugin de fil d\'ariane.', 'wp-starter-basic'),
      admin_url('plugin-install.php?s=wordpress-seo&tab=search&type=term')
    );
  }

  // Affiche les notices dans l'admin si nécessaire
  if (!empty($notices) && is_admin()) {
    foreach ($notices as $notice) {
      add_action('admin_notices', function () use ($notice) {
        echo '<div class="notice notice-info is-dismissible"><p>' . wp_kses_post($notice) . '</p></div>';
      });
    }
  }
}
add_action('admin_init', 'wp_starter_basic_check_dependencies');
