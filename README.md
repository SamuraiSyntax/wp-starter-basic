# WP Starter Basic

Un thème WordPress de base avec une structure moderne et les fonctionnalités essentielles.

## Description

WP Starter Basic est un thème WordPress minimaliste conçu pour servir de point de départ pour le développement de thèmes personnalisés. Il intègre les meilleures pratiques de développement et une architecture modulaire.

## Caractéristiques

- Structure SASS moderne avec architecture en modules
- Support complet de la personnalisation WordPress
- Menu de navigation responsive avec sous-menus
- Support RTL
- Optimisé pour l'accessibilité
- Compatible Gutenberg
- Support des widgets
- Performance optimisée

## Prérequis

- WordPress 5.0 ou supérieur
- PHP 7.4 ou supérieur
- Node.js et npm pour le développement

## Installation

1. Dans votre administration WordPress, allez dans Apparence > Thèmes > Ajouter
2. Cliquez sur "Téléverser un thème"
3. Choisissez le fichier zip du thème
4. Cliquez sur "Installer maintenant"
5. Activez le thème

## Développement

### Installation des dépendances

1. Installez les dépendances du projet avec npm :

   ```bash
   npm install
   ```

2. Compilez les fichiers SCSS en CSS :

   - Compilation et watch

   ```bash
   npm run sass
   ```

   - Compilation unique

   ```bash
   npm run sass:build
   ```

3. Activez le thème dans l'administration WordPress (Apparence > Thèmes)

### Structure des fichiers

```bash
wp-starter-basic/
├── assets/
│ ├── css/
│ ├── js/
│ └── sass/
│ ├── base/
│ ├── components/
│ ├── variables/
│ └── style.scss
├── inc/
│ ├── template-functions.php
│ ├── template-tags.php
│ └── customizer.php
├── languages/
├── template-parts/
├── functions.php
├── header.php
├── footer.php
├── index.php
└── style.css
```

### Architecture SASS

Le thème utilise une architecture SASS modulaire :

- `base/` : Styles de base et reset
- `components/` : Composants réutilisables
- `variables/` : Variables globales et configuration
- `style.scss` : Point d'entrée principal

## Personnalisation

### Variables SASS

Les variables principales peuvent être modifiées dans les fichiers :

- `_variables.scss` : Configuration globale
- `variables/_colors.scss` : Couleurs
- `variables/_typography.scss` : Typographie
- `variables/_layout.scss` : Mise en page
- `variables/_spacing.scss` : Espacements

### Customizer

Le thème supporte la personnalisation via le Customizer WordPress :

- Logo personnalisé
- Couleurs du thème
- Options de mise en page
- Widgets

## Support Navigateurs

- Chrome (dernières versions)
- Firefox (dernières versions)
- Safari (dernières versions)
- Edge (dernières versions)
- IE11 (support basique)

## Changelog

### 1.0.0

- Version initiale
- Structure SASS moderne
- Support complet des fonctionnalités WordPress
- Menu responsive
- Support RTL

## Crédits

- [Normalize.css](https://necolas.github.io/normalize.css/), (C) 2012-2018 Nicolas Gallagher and Jonathan Neal, [MIT](https://opensource.org/licenses/MIT)

## Licence

Ce thème est sous licence GPL v2 ou ultérieure - voir le fichier [LICENSE](LICENSE) pour plus de détails.

## Auteur

[SamuraiSyntax](https://github.com/SamuraiSyntax)

## Contribueurs

- [@SamuraiSyntax](https://github.com/SamuraiSyntax)
