<?php

/**
 * Fonctions de personnalisation du thème
 */

function wp_starter_basic_customize_register($wp_customize)
{
  // Ajouter une section pour les options du thème
  $wp_customize->add_section('wp_starter_basic_theme_options', array(
    'title'    => __('Options du thème', 'wp-starter-basic'),
    'priority' => 130,
  ));

  // Couleur principale
  $wp_customize->add_setting('wp_starter_basic_primary_color', array(
    'default'           => '#007bff',
    'sanitize_callback' => 'sanitize_hex_color',
  ));

  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'wp_starter_basic_primary_color', array(
    'label'    => __('Couleur principale', 'wp-starter-basic'),
    'section'  => 'wp_starter_basic_theme_options',
    'settings' => 'wp_starter_basic_primary_color',
  )));

  // Copyright du footer
  $wp_customize->add_setting('wp_starter_basic_footer_copyright', array(
    'default'           => '',
    'sanitize_callback' => 'wp_kses_post',
  ));

  $wp_customize->add_control('wp_starter_basic_footer_copyright', array(
    'label'    => __('Texte de copyright', 'wp-starter-basic'),
    'section'  => 'wp_starter_basic_theme_options',
    'settings' => 'wp_starter_basic_footer_copyright',
    'type'     => 'textarea',
  ));

  // Ajouter une option pour le logo du site
  $wp_customize->add_setting('wp_starter_basic_logo', array(
    'default'           => '',
    'sanitize_callback' => 'esc_url_raw',
  ));

  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'wp_starter_basic_logo', array(
    'label'    => __('Logo du site', 'wp-starter-basic'),
    'section'  => 'wp_starter_basic_theme_options',
    'settings' => 'wp_starter_basic_logo',
  )));
}
add_action('customize_register', 'wp_starter_basic_customize_register');

/**
 * Génère le CSS personnalisé
 */
function wp_starter_basic_customize_css()
{
  $primary_color = get_theme_mod('wp_starter_basic_primary_color', '#007bff'); ?>
<style type="text/css">
a {
  color: <?php echo esc_attr($primary_color);
  ?>;
}

.main-navigation {
  background-color: <?php echo esc_attr($primary_color);
  ?>;
}

.button,
button,
input[type="button"],
input[type="reset"],
input[type="submit"] {
  background-color: <?php echo esc_attr($primary_color);
  ?>;
}
</style>
<?php }
add_action('wp_head', 'wp_starter_basic_customize_css');