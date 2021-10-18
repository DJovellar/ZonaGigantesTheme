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
            <span>Puedes encontrarnos en: </span>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 pt-3 pt-sm-0 pt-md-0 pt-lg-0 pt-xl-0">
            <div class="row">
              <div class="col-2">
                <a href="https://twitter.com/zonagigantes" target="_blank" rel="nofollow"><img src="<?php bloginfo('template_url');?>/images/other-icons/icon-twitter.png" width="25" height="20"></img></a>
              </div>
              <div class="col-2">
                <a href="https://www.instagram.com/zonagigantes_/" target="_blank" rel="nofollow"><img src="<?php bloginfo('template_url');?>/images//other-icons/logo-instagram.png" width="25" height="25"></img></a>
              </div>
              <div class="col-2">
                <a href="https://www.facebook.com/ZonaGigantes1/" target="_blank" rel="nofollow"><img src="<?php bloginfo('template_url');?>/images/other-icons/icon-facebook.png" width="25" height="25"></img></a>
              </div>
              <div class="col-2">
                <a href="https://www.youtube.com/channel/UC9MUffNRPYDd3S2JlVXpBlw" target="_blank" rel="nofollow"><img src="<?php bloginfo('template_url');?>/images/other-icons/youtube-icon.png" width="32" height="32"></img></a>
              </div>
              <div class="col-2">
                <a href="https://www.twitch.tv/amanecenewyork" target="_blank" rel="nofollow"><img src="<?php bloginfo('template_url');?>/images/other-icons/twitch-icon.png" width="24" height="24"></img></a>
              </div>
              <div class="col-2">
                <a href="https://t.me/zonagigantes" target="_blank" rel="nofollow"><img src="<?php bloginfo('template_url');?>/images/other-icons/telegram-icon.png" width="28" height="28"></img></a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </header>