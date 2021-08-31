
<?php wp_head() ?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="google-site-verification" content="7w-hYvGG0S9p67FeGXIgiq3V74CpBia8YdDrs2Yusak" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/style.css?ver=<?php echo rand(111,999)?>">

    <!-- Icono en el navegador -->
    <link rel="icon" href="<?php bloginfo('template_url');?>/images/other-icons/favicon.ico" />

    <title> Zona Gigantes </title>
  </head>
  <body class="bg-light">
    <header class="font-title">
      <div class="pt-4 pb-1 container">
          <span class="container text-logo">Giants en español</span>
      </div>
      <div class="container-fluid color-giants">
        <nav class="navbar navbar-expand-lg navbar-dark container position-relative">
            <a class="navbar-brand position-absolute" href="<?php echo esc_url(home_url('/')) ?>">
              <img src="<?php bloginfo('template_url');?>/images/other-icons/logo-zonaGigantes.png" width="140" height="140" class="img-fluid" alt="Icono Zona Gigantes" loading="lazy">
              <span class="navbar-brand pl-3 hide-name">Zona Gigantes</span>
            </a>
            <div class=""></div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="true" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <?php wp_nav_menu(array(
              'theme_location' => 'principal',
              'container' => 'div',
              'container_class' => 'collapse navbar-collapse',
              'container_id' => 'navbarNavAltMarkup',
              'items_wrap' => '<ul class="navbar-nav ml-auto move-items-menu">%3$s</ul>',
              'menu_class' => 'nav-item'
            )); ?>
        </nav>
      </div>

      <div class="container pt-5">
        <div class="row">
          <div class="col-12 col-sm-12 col-lg-6 col-xl-6 text-center"></div>
          <div class="col-12 col-sm-6 col-lg-3 col-xl-3 text-center">
            <h6>Puedes encontrarnos en: </h6>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 pt-3 pt-sm-0 pt-md-0 pt-lg-0 pt-xl-0">
            <div class="row">
              <div class="col-2">
                <a href="https://twitter.com/zonagigantes" target="_blank"><img src="<?php bloginfo('template_url');?>/images/other-icons/icon-twitter.png" width="25" height="20"></img></a>
              </div>
              <div class="col-2">
                <a href="https://www.instagram.com/zonagigantes_/" target="_blank"><img src="<?php bloginfo('template_url');?>/images//other-icons/logo-instagram.png" width="25" height="25"></img></a>
              </div>
              <div class="col-2">
                <a href="https://www.facebook.com/ZonaGigantes1/" target="_blank"><img src="<?php bloginfo('template_url');?>/images/other-icons/icon-facebook.png" width="25" height="25"></img></a>
              </div>
              <div class="col-2">
                <a href="https://www.youtube.com/channel/UC9MUffNRPYDd3S2JlVXpBlw" target="_blank"><img src="<?php bloginfo('template_url');?>/images/other-icons/youtube-icon.png" width="32" height="32"></img></a>
              </div>
              <div class="col-2">
                <a href="https://www.twitch.tv/amanecenewyork" target="_blank"><img src="<?php bloginfo('template_url');?>/images/other-icons/twitch-icon.png" width="24" height="24"></img></a>
              </div>
              <div class="col-2">
                <a href="https://t.me/zonagigantes" target="_blank"><img src="<?php bloginfo('template_url');?>/images/other-icons/telegram-icon.png" width="28" height="28"></img></a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </header>

<div class="container text-center pt-3 font-text">
    <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-4 col-xs-12 pt-4">
            <div class="card">
                <img class="card-img-top img-product" src="<?php bloginfo('template_url');?>/images/shop/camiseta-azul.jpg" alt="Card image cap" >
                <div class="container d-flex justify-content-center">
                    <div class="row pt-2 pb-2">
                        <a href="https://www.latostadora.com/zonagigantes/hombre_manga_corta_azul_royal_calidad_extra/5815342" target="_blank" rel="nofollow">
                            <button type="button" class="btn btn-sm color-giants text-white font-title">Personalizar</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-xs-12 pt-4">
            <div class="card">
                <img class="card-img-top img-product" src="<?php bloginfo('template_url');?>/images/shop/camiseta-negra.jpg" alt="Card image cap" >
                <div class="container d-flex justify-content-center">
                    <div class="row pt-2 pb-2">
                        <a href="https://www.latostadora.com/zonagigantes/hombre_manga_corta_negra_calidad_extra/5815347" target="_blank" rel="nofollow">
                            <button type="button" class="btn btn-sm color-giants text-white font-title">Personalizar</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-xs-12 pt-4">
            <div class="card">
                <img class="card-img-top img-product" src="<?php bloginfo('template_url');?>/images/shop/camiseta-gris.jpg" alt="Card image cap" >
                <div class="container d-flex justify-content-center">
                    <div class="row pt-2 pb-2">
                        <a href="https://www.latostadora.com/zonagigantes/hombre_manga_corta_gris_vigore_calidad_extra/5815350" target="_blank" rel="nofollow">
                            <button type="button" class="btn btn-sm color-giants text-white font-title">Personalizar</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-4 col-xs-12 pt-4">
            <div class="card">
                <img class="card-img-top img-product" src="<?php bloginfo('template_url');?>/images/shop/camiseta-mujer-blanca.jpg" alt="Card image cap" >
                <div class="container d-flex justify-content-center">
                    <div class="row pt-2 pb-2">
                        <a href="https://www.latostadora.com/zonagigantes/mujer_estilo_beisbol_blanca_y_azul_royal/5815399" target="_blank" rel="nofollow">
                            <button type="button" class="btn btn-sm color-giants text-white font-title">Personalizar</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-xs-12 pt-4">
            <div class="card">
                <img class="card-img-top img-product" src="<?php bloginfo('template_url');?>/images/shop/sudadera-negra.jpg" alt="Card image cap" >
                <div class="container d-flex justify-content-center">
                    <div class="row pt-2 pb-2">
                        <a href="https://www.latostadora.com/zonagigantes/hombre_sudadera_con_capucha_azul_marino/5815406" target="_blank" rel="nofollow">
                            <button type="button" class="btn btn-sm color-giants text-white font-title">Personalizar</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-xs-12 pt-4">
            <div class="card">
                <img class="card-img-top img-product" src="<?php bloginfo('template_url');?>/images/shop/camiseta-blanca-nyc.jpg" alt="Card image cap" >
                <div class="container d-flex justify-content-center">
                    <div class="row pt-2 pb-2">
                        <a href="https://www.latostadora.com/zonagigantes/hombre_manga_corta_blanco_calidad_extra/5815451" target="_blank" rel="nofollow">
                            <button type="button" class="btn btn-sm color-giants text-white font-title">Personalizar</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-4 col-xs-12 pt-4">
            <div class="card">
                <img class="card-img-top img-product" src="<?php bloginfo('template_url');?>/images/shop/camiseta-azul-oscuro.jpg" alt="Card image cap" >
                <div class="container d-flex justify-content-center">
                    <div class="row pt-2 pb-2">
                        <a href="https://www.latostadora.com/zonagigantes/hombre_manga_corta_denim_calidad_extra/5815480" target="_blank" rel="nofollow">
                            <button type="button" class="btn btn-sm color-giants text-white font-title">Personalizar</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-xs-12 pt-4">
            <div class="card">
                <img class="card-img-top" src="<?php bloginfo('template_url');?>/images/shop/taza-blanca.jpg" alt="Card image cap" >
                <div class="container d-flex justify-content-center">
                    <div class="row pt-2 pb-2">
                        <a href="https://www.latostadora.com/zonagigantes/taza/5815831" target="_blank" rel="nofollow">
                            <button type="button" class="btn btn-sm color-giants text-white font-title">Personalizar</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-xs-12 pt-4">
            <div class="card">
                <img class="card-img-top img-product" src="<?php bloginfo('template_url');?>/images/shop/camiseta-blanca-saquon.jpg" alt="Card image cap" >
                <div class="container d-flex justify-content-center">
                    <div class="row pt-2 pb-2">
                        <a href="https://www.latostadora.com/zonagigantes/hombre_manga_corta_blanco_calidad_extra/5815874" target="_blank" rel="nofollow">
                            <button type="button" class="btn btn-sm color-giants text-white font-title">Personalizar</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer()?>