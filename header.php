<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Style -->
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/style.css?ver=<?php echo rand(111,999)?>">

    <title>Zona Gigantes</title>
  </head>
  <body>
    <header>
      <div class="pt-4"></div>
      <div class="container-fluid" style="background-color: blue;">
        <nav class="navbar navbar-expand-lg navbar-dark container">
            <a class="navbar-brand px-3" href="<?php echo esc_url(home_url('/')) ?>">
                <img src="<?php bloginfo('template_url');?>/images/other-icons/logo.png" width="50" height="50" class="img-fluid" alt="Icono Zona Gigantes" loading="lazy">
            </a>
            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')) ?>">Zona Gigantes</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <?php wp_nav_menu(array(
              'theme_location' => 'principal',
              'container' => 'div',
              'container_class' => 'collapse navbar-collapse',
              'container_id' => 'navbarNavAltMarkup',
              'items_wrap' => '<ul class="navbar-nav ml-auto text-center">%3$s</ul>',
              'menu_class' => 'nav-item'
            )); ?>
        </nav>
      </div>

      <div class="container pt-5">
        <div class="row">
          <div class="col-12 col-sm-12 col-lg-6 col-xl-6 text-center"></div>
          <div class="col-6 col-sm-6 col-lg-3 col-xl-3 text-center">
            <h6>Puedes encontrarnos en: </h6>
          </div>
          <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3">
            <div class="row">
              <div class="col-3">
                <a href="https://twitter.com/zonagigantes" target="_blank"><img src="<?php bloginfo('template_url');?>/images/other-icons/icon-twitter.png" width="25" height="20"></img></a>
              </div>
              <div class="col-3">
                <a href="https://www.instagram.com/zonagigantes_/" target="_blank"><img src="<?php bloginfo('template_url');?>/images//other-icons/logo-instagram.png" width="25" height="25"></img></a>
              </div>
              <div class="col-3">
                <a href="https://www.facebook.com/ZonaGigantes1/" target="_blank"><img src="<?php bloginfo('template_url');?>/images/other-icons/icon-facebook.png" width="25" height="25"></img></a>
              </div>
              <div class="col-3">
                <a href="https://www.youtube.com/channel/UC9MUffNRPYDd3S2JlVXpBlw" target="_blank"><img src="<?php bloginfo('template_url');?>/images/other-icons/youtube-icon.png" width="30" height="30"></img></a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </header>