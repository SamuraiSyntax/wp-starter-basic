(function () {
  document.addEventListener('DOMContentLoaded', function () {
    'use strict';

    const initMobileMenu = () => {
      const menuToggle = document.querySelector('.menu-toggle');
      const primaryMenu = document.querySelector('.nav-menu');
      const subMenuParents = document.querySelectorAll('.menu-item-has-children');

      if (!menuToggle || !primaryMenu) {
        return;
      }

      // État initial du menu
      menuToggle.setAttribute('aria-expanded', 'false');

      // Toggle du menu principal
      menuToggle.addEventListener('click', () => {
        const isExpanded = primaryMenu.classList.contains('toggled');
        primaryMenu.classList.toggle('toggled');
        menuToggle.setAttribute('aria-expanded', !isExpanded);
        menuToggle.setAttribute('aria-label', isExpanded ? 'Ouvrir le menu' : 'Fermer le menu');
      });

      // Gestion des sous-menus
      subMenuParents.forEach(parent => {
        const link = parent.querySelector('a');
        const subMenu = parent.querySelector('.sub-menu');

        // Créer le bouton dropdown
        const dropdownToggle = document.createElement('button');
        dropdownToggle.className = 'dropdown-toggle';
        dropdownToggle.setAttribute('aria-expanded', 'false');
        dropdownToggle.innerHTML = '<span class="screen-reader-text">Ouvrir le sous-menu</span>';

        // Insérer le bouton après le lien
        link.parentNode.insertBefore(dropdownToggle, link.nextSibling);

        // Gérer le clic sur mobile
        const handleMobileClick = e => {
          if (768 >= window.innerWidth) {
            e.preventDefault();
            subMenu.classList.toggle('toggled');
            dropdownToggle.setAttribute('aria-expanded', subMenu.classList.contains('toggled'));
          }
        };

        // Événements
        dropdownToggle.addEventListener('click', handleMobileClick);
        link.addEventListener('click', handleMobileClick);
      });
    };

    // Initialisation
    initMobileMenu();

    // Réinitialiser en cas de redimensionnement
    let resizeTimer;
    window.addEventListener('resize', () => {
      clearTimeout(resizeTimer);
      resizeTimer = setTimeout(() => {
        const menus = document.querySelectorAll('.sub-menu.toggled');
        if (768 < window.innerWidth) {
          menus.forEach(menu => menu.classList.remove('toggled'));
        }
      }, 250);
    });
  });
})();
