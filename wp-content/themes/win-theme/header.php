<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
  <title><?php echo wp_get_document_title() ?></title>

  <meta charset="<?php bloginfo('charset') ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">

<?php wp_head() ?>
</head>

<body class="body" id="body">
<header class="header">
  <div class="container">
    <div class="header__inner">
        <a href="/" class="header-logo">
  <?php
  $header_logo = get_theme_mod('header_logo');
  $img = wp_get_attachment_image_src($header_logo, 'full');
  if ($img) :
    ?>
    <img src="<?php echo $img[0]; ?>" alt="">
  <?php endif; ?>
</a>

      <div class="header__menu">

        <nav class="menu">
        
            <?php 
                if( has_nav_menu( 'head_menu' )) {
                    wp_nav_menu( array(
                        'theme_location' => 'head_menu',
                        'container' => 'div',
                        'container_class' => 'header__menu-wrapper',
                        //'menu_class' => 'nav navbar-nav',
                        'items_wrap' => '<ul class="menu__list">%3$s</ul>',
                        //'depth' => 2,
                        //'walker' => new Site_Nav()
                    ));
                }
            ?>   
          
        </nav>

      </div>

      <div class="header__right">

        <a class="header__tel tel btn" href="tel:+79062629121">
          <span>Позвонить</span>
          <svg class="header__tel-icon" width="21" height="20" viewBox="0 0 21 20" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
              d="M0.291794 16.6307L3.25257 19.4279C3.68961 19.8547 4.26891 19.9993 4.8331 20C7.32809 19.9288 9.68642 18.7616 11.6228 17.5631C14.8011 15.3609 17.7175 12.6303 19.5478 9.33053C20.2498 7.94681 21.0735 6.1813 20.9948 4.63681C20.9877 4.05581 20.8234 3.4856 20.3937 3.1111L17.433 0.292748C16.8181 -0.205302 16.2236 -0.0331024 15.8301 0.547031L13.4482 4.84873C13.1975 5.35835 13.3413 5.90438 13.7154 6.26853L14.8062 7.30686C14.8735 7.39471 14.9164 7.49471 14.9175 7.60355C14.4992 9.14558 13.232 10.5669 12.1126 11.545C10.9931 12.5231 9.78987 13.8483 8.22796 14.162C8.0349 14.2133 7.79842 14.2313 7.66029 14.109L6.39137 12.88C5.95394 12.5642 5.32236 12.4099 4.85537 12.6681H4.83311L0.53669 15.0838C-0.0940285 15.4603 -0.159794 16.188 0.291794 16.6307Z"
              fill="#FFF" />
          </svg>

        </a>

        <button class="header__burger burger js-toggle-menu" type="button">
          <span class="burger__line"></span>
          <span class="sr-only">open/close menu</span>
        </button>

      </div>

    </div>

  </div>

</header>

<main class="main">