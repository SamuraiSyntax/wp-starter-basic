<?php

/**
 * Template part pour l'affichage d'un message quand aucun contenu n'est trouvé
 */
?>

<section class="no-results not-found">
  <header class="page-header">
    <h1 class="page-title">
      <?php esc_html_e('Rien n\'a été trouvé', 'wp-starter-basic'); ?>
    </h1>
  </header>

  <div class="page-content">
    <?php if (is_home() && current_user_can('publish_posts')) :
      printf(
        '<p>' . wp_kses(
          __('Prêt à publier votre premier article ? <a href="%1$s">Commencez ici</a>.', 'wp-starter-basic'),
          array(
            'a' => array(
              'href' => array(),
            ),
          )
        ) . '</p>',
        esc_url(admin_url('post-new.php'))
      );
    elseif (is_search()) : ?>
    <p>
      <?php esc_html_e('Désolé, mais rien ne correspond à vos critères de recherche. Veuillez réessayer avec d\'autres mots-clés.', 'wp-starter-basic'); ?>
    </p>
    <?php get_search_form();
    else : ?>
    <p>
      <?php esc_html_e('Il semble que nous ne trouvions pas ce que vous cherchez. Essayez peut-être une recherche ?', 'wp-starter-basic'); ?>
    </p>
    <?php get_search_form();
    endif; ?>
  </div>
</section>