  <?php
  /**
   * Le pied de page du thème
   */
  ?>

  <footer id="colophon" class="site-footer">
    <div class="site-info">
      <div class="footer-widgets">
        <?php if (is_active_sidebar('footer-1')) : ?>
        <div class="footer-widget-area">
          <?php dynamic_sidebar('footer-1'); ?>
        </div>
        <?php endif; ?>
      </div>

      <div class="footer-bottom">
        <?php
        $copyright = get_theme_mod('wp_starter_basic_footer_copyright');
        if ($copyright) {
          echo wp_kses_post($copyright);
        } else {
          printf(
            esc_html__('© %1$s %2$s. Tous droits réservés.', 'wp-starter-basic'),
            date('Y'),
            get_bloginfo('name')
          );
        }
        ?>
        <span class="sep"> | </span>
        <?php printf(
          esc_html__('Thème : %1$s par %2$s.', 'wp-starter-basic'),
          'WP Starter Basic',
          '<a href="https://votre-site.com">Votre Nom</a>'
        ); ?>
      </div>

      <?php
      wp_nav_menu(array(
        'theme_location' => 'footer',
        'menu_id'        => 'footer-menu',
        'container'      => 'nav',
        'container_class' => 'footer-navigation',
        'depth'          => 1,
      ));
      ?>
    </div>
  </footer>
  </div><!-- #page -->

  <?php wp_footer(); ?>

  </body>

  </html>