
<?php get_header(); ?>

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

  <div class="container pt-4 pb-4">
    <h2>Noticias</h2>
    <hr>
    <div class="row no-gutters">
      <?php 
        $posts = new WP_Query(array(
          'cat' => '3',
          'posts_per_page' => 2,
        ));
        if ($posts->have_posts() ) : while ( $posts->have_posts() ) : $posts->the_post(); ?>
            <div class="col-12 com-sm-12 col-md-12 col-lg-6 col-xl-6">
              <div class="card">
                <a href="<?php the_permalink(); ?>" class="stretched-link"><img src="<?php bloginfo('template_url');?>/images/articles-img/daniel_jones.png" class="card-img-top img-card-principal" alt=""></a>
                <div class="card-img-overlay d-flex flex-column justify-content-end">
                  <h5 class="card-title text-white typography-principal"><?php the_title(); ?></h5>
                  <p class="card-text text-white typography-principal"><b> Autor:</b> <?php the_author(); ?></p>
                </div>
              </div>
            </div>
      <?php endwhile; endif; ?>
    </div>
    <div class="row no-gutters">
      <?php 
          $posts = new WP_Query(array(
            'cat' => '3',
            'posts_per_page' => 3,
            'offset' => 2,
          ));
          if ($posts->have_posts() ) : while ( $posts->have_posts() ) : $posts->the_post(); ?>
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 img-padding">
              <div class="card">
                <a href="<?php the_permalink(); ?>" class="stretched-link"><img src="<?php bloginfo('template_url');?>/images/articles-img/joe_judge.png" class="card-img-top img-card-secondary" alt=""></a>
                <div class="card-img-overlay d-flex flex-column justify-content-end">
                  <h5 class="card-title text-white typography"><?php the_title(); ?></h5>
                  <p class="card-text text-white typography"><b>Autor:</b> <?php the_author(); ?> </p>
                </div>
              </div>
            </div>
        <?php endwhile; endif; ?>
    </div>
  </div>

  <div class="container pt-5">
    <div class="row">
      <div class="col-12 col-sm-12 col-mb-6 col-lg-6 col-xl-6">
        <h5 class="text-center">NFC East</h5>
        <hr>
        <table class="table table-borderless">
          <thead class="thead-dark">
            <tr>
              <th scope="col" style="padding-left: 70px;">Equipo</th>
              <th scope="col" class="text-center">W</th>
              <th scope="col" class="text-center">L</th>
              <th scope="col" class="text-center">Tie</th>
              <th scope="col" class="text-center">%</th>
            </tr>
          </thead>
          <tbody>
            <tr >
              <td class="pl-5"><img src="<?php bloginfo('template_url');?>/images/icon-teams/giants-icon.png" class="img-fluid" alt="Icono New York Giants" width="25" height="25"> Giants</td>
              <td class="text-center">5</td>
              <td class="text-center">1</td>
              <td class="text-center">0</td>
              <td class="text-center">.826</td>
            </tr>
            <tr>
              <td class="pl-5"><img src="<?php bloginfo('template_url');?>/images/icon-teams/cowboys-icon.png" class="img-fluid" alt="Icono Dallas Cowboys" width="25" height="25"> Cowboys</td>
              <td class="text-center">4</td>
              <td class="text-center">2</td>
              <td class="text-center">0</td>
              <td class="text-center">.671</td>
            </tr>
            <tr>
              <td class="pl-5"><img src="<?php bloginfo('template_url');?>/images/icon-teams/washington-icon.png" class="img-fluid" alt="Icono Washington Football Team" width="25" height="25"> Redskins</td>
              <td class="text-center">3</td>
              <td class="text-center">3</td>
              <td class="text-center">0</td>
              <td class="text-center">.500</td>
            </tr>
            <tr>
              <td class="pl-5"><img src="<?php bloginfo('template_url');?>/images/icon-teams/eagles-icon.png" class="img-fluid" alt="Icono Philadelphia Eagles" width="25" height="25"> Eagles</td>
              <td class="text-center">0</td>
              <td class="text-center">6</td>
              <td class="text-center">0</td>
              <td class="text-center">.000</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-12 col-sm-12 col-mb-6 col-lg-6 col-xl-6">
        <h5 class="text-center">Proximos partidos</h5>
        <hr>
        <table class="table table-borderless">
          <thead class="thead-dark">
            <tr>
              <th scope="col" style="padding-left: 70px;">Rival</th>
              <th scope="col" class="text-center">Resultado</th>
              <th scope="col" class="text-center">Fecha</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="pl-5"><img src="<?php bloginfo('template_url');?>/images/icon-teams/steelers-icon.png" class="img-fluid" alt="Icono Pittsburgh Steelers" width="25" height="25"> Steelers</td>
              <td class="text-center">*</td>
              <td class="text-center">15/09 01:15</td>
            </tr>
            <tr>
              <td class="pl-5"><img src="<?php bloginfo('template_url');?>/images/icon-teams/bears-icon.png" class="img-fluid" alt="Icono Pittsburgh Steelers" width="25" height="25"> Bears</td>
              <td class="text-center">*</td>
              <td class="text-center">20/09 19:00</td>
            </tr>
            <tr>
              <td class="pl-5"><img src="<?php bloginfo('template_url');?>/images/icon-teams/49ers-icon.png" class="img-fluid" alt="Icono Pittsburgh Steelers" width="25" height="25"> 49ers</td>
              <td class="text-center">*</td>
              <td class="text-center">27/09 19:00</td>
            </tr>
            <tr>
              <td class="pl-5"><img src="<?php bloginfo('template_url');?>/images/icon-teams/rams-icon.png" class="img-fluid" alt="Icono Pittsburgh Steelers" width="25" height="25"> Rams</td>
              <td class="text-center">*</td>
              <td class="text-center">04/10 22:05</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="container pt-4 pb-1">
    <h2>Cronicas</h2>
    <hr>
    <div class="row no-gutters">
      <?php 
        $posts = new WP_Query(array(
          'cat' => '4',
          'posts_per_page' => 1,
        ));
        if ($posts->have_posts() ) : while ( $posts->have_posts() ) : $posts->the_post(); ?>
          <div class="col-12 com-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
              <a href="<?php the_permalink(); ?>" class="stretched-link"><img src="<?php bloginfo('template_url');?>/images/cronicas-img/giants-steelers.png" class="card-img-top img-card-cronica-principal" alt=""></a>
              <div class="card-img-overlay d-flex flex-column justify-content-end">
                <h5 class="card-title text-white typography-principal"><?php the_title(); ?></h5>
                <p class="card-text text-white typography-principal"><b>Autor:</b> <?php the_author(); ?></p>
              </div>
            </div>
          </div>
        <?php endwhile; endif; ?>
    </div>
    <div class="row no-gutters">
      <?php 
        $posts = new WP_Query(array(
          'cat' => '4',
          'posts_per_page' => 2,
          'offset' => 1,
        ));
        if ($posts->have_posts() ) : while ( $posts->have_posts() ) : $posts->the_post(); ?>
          <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 img-padding">
            <div class="card">
              <a href="<?php the_permalink(); ?>" class="stretched-link"><img src="<?php bloginfo('template_url');?>/images/articles-img/joe_judge.png" class="card-img-top img-card-cronica-secondary" alt=""></a>
              <div class="card-img-overlay d-flex flex-column justify-content-end">
                <h5 class="card-title text-white typography"><?php the_title(); ?></h5>
                <p class="card-text text-white typography"><b>Autor:</b> <?php the_author(); ?></p>
              </div>
            </div>
          </div>
        <?php endwhile; endif; ?>
    </div>
  </div>

  <div class="container pt-4">
    <h2>Videos</h2>
    <hr>
    <div class="row no-gutters">
      <div class="col-12 com-sm-12 col-md-12 col-lg-6 col-xl-6">
        <div class="card">
          <img src="<?php bloginfo('template_url');?>/images/articles-img/daniel_jones.png" class="card-img-top img-card-principal" alt="">
          <div class="card-img-overlay d-flex flex-column justify-content-end">
            <h5 class="card-title text-white typography-principal">¿Sera este año la confirmación de DJ como QB franquicia?</h5>
            <p class="card-text text-white typography-principal"><b> Autor:</b> Ruben Fernandez</p>
          </div>
        </div>
      </div>
      <div class="col-12 com-sm-12 col-md-12 col-lg-6 col-xl-6 img-padding">
        <div class="card">
          <img src="<?php bloginfo('template_url');?>/images/articles-img/saquon_barkley.png" class="card-img-top img-card-principal" alt="">
          <div class="card-img-overlay d-flex flex-column justify-content-end">
            <h5 class="card-title text-white typography-principal">¿Cuanto puede pedir nuestro RB estrella al terminar su contrato Rookie?</h5>
            <p class="card-text text-white typography-principal"><b>Autor:</b> Pablo Cañibano</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row no-gutters">
      <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 img-padding">
        <div class="card">
          <img src="<?php bloginfo('template_url');?>/images/articles-img/joe_judge.png" class="card-img-top img-card-secondary" alt="">
          <div class="card-img-overlay d-flex flex-column justify-content-end">
            <h5 class="card-title text-white typography">Joe Judge, el sargento de hierro</h5>
            <p class="card-text text-white typography"><b>Autor:</b> Jorge Vico</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 img-padding">
        <div class="card d-block">
          <img src="<?php bloginfo('template_url');?>/images/articles-img/jadeveon_clowney.png" class="card-img-top img-card-secondary" alt="">
          <div class="card-img-overlay d-flex flex-column justify-content-end">
            <h5 class="card-title text-white typography">¿Merece la pena pagar por Jadeveon Clowney?</h5>
            <p class="card-text text-white typography"><b>Autor:</b> Alejandro Caviedes</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 img-padding">
        <div class="card d-flex">
          <img src="<?php bloginfo('template_url');?>/images/articles-img/darius_slayton.png" class="card-img-top img-card-secondary" alt="">
          <div class="card-img-overlay d-flex flex-column justify-content-end">
            <h5 class="card-title text-white typography">¿Repetira Slayton su gran año de Rookie?</h5>
            <p class="card-text text-white typography"><b>Autor:</b> David Jovellar</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php get_footer()?>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <!-- <script src="js/bootstrap.min.js"></script> -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>  
</body>
</html>