
<?php wp_head() ?>
<?php get_header(); ?>

  <div class="container pt-4 pb-4">
    <h2>Últimas noticias</h2>
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
                <a href="<?php the_permalink(); ?>" class="stretched-link">
                  <?php if (has_post_thumbnail()) the_post_thumbnail('post-thumbnails', array( 'class' => 'card-img-top img-card-principal' )) ?>
                </a>
                <div class="card-img-overlay text-right">
                    <p class="card-text text-white font-text custom-shadow">
                      <?php echo 'Hace ' . esc_html( human_time_diff( get_the_time('U'), current_time('timestamp') ) ); ?>
                    </p>
                </div>
                <div class="card-img-overlay d-flex flex-column justify-content-end custom-shadow">
                  <h4 class="card-title text-white"><?php the_title(); ?></h4>
                  <p class="card-text text-white font-text">
                    Por <b><?php the_author(); ?></b>
                  </p>
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
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
              <div class="card">
              <a href="<?php the_permalink(); ?>" class="stretched-link">
                  <?php if (has_post_thumbnail()) the_post_thumbnail('post-thumbnails', array( 'class' => 'card-img-top img-card-secondary' )) ?>
                </a>
                <div class="card-img-overlay text-right">
                    <p class="card-text text-white font-text custom-shadow">
                      <?php echo 'Hace ' . esc_html( human_time_diff( get_the_time('U'), current_time('timestamp') ) ); ?>
                    </p>
                </div>
                <div class="card-img-overlay d-flex flex-column justify-content-end custom-shadow">
                  <h5 class="card-title text-white"><?php the_title(); ?></h5>
                  <p class="card-text text-white font-text">
                    Por <b><?php the_author(); ?></b>
                  </p>
                </div>
              </div>
            </div>
        <?php endwhile; endif; ?>
    </div>
  </div>

  <div class="container pt-4">
    <div class="row">
      <div class="col-12 col-sm-12 col-mb-6 col-lg-6 col-xl-6">
        <h5 class="text-center">NFC East</h5>
        <hr>
        <table class="table table-borderless">
          <thead class="thead-dark font-title text-center">
            <tr>
              <th scope="col" style="background-color: #00035F;">Equipo</th>
              <th scope="col" class="text-center" style="background-color: #00035F;">W</th>
              <th scope="col" class="text-center" style="background-color: #00035F;">L</th>
              <th scope="col" class="text-center" style="background-color: #00035F;">Tie</th>
              <th scope="col" class="text-center" style="background-color: #00035F;">%</th>
            </tr>
          </thead>
          <tbody class="font-text font-size-min">
            <tr>
              <td><img src="<?php bloginfo('template_url');?>/images/icon-teams/giants-icon.png" class="img-fluid table-row-custom" alt="Icono New York Giants" width="25" height="25"> <span class="pl-1">Giants</span></td>
              <td class="text-center">5</td>
              <td class="text-center">7</td>
              <td class="text-center">0</td>
              <td class="text-center">.417</td>
            </tr>
            <tr>
              <td><img src="<?php bloginfo('template_url');?>/images/icon-teams/washington-icon2.png" class="img-fluid table-row-custom" alt="Icono Washington Football Team" width="22" height="22"> <span class="pl-1">Washington </span></td>
              <td class="text-center">5</td>
              <td class="text-center">7</td>
              <td class="text-center">0</td>
              <td class="text-center">.417</td>
            </tr>
            <tr>
              <td><img src="<?php bloginfo('template_url');?>/images/icon-teams/eagles-icon.png" class="img-fluid table-row-custom" alt="Icono Philadelphia Eagles" width="25" height="25"> <span class="pl-1">Eagles </span></td>
              <td class="text-center">3</td>
              <td class="text-center">8</td>
              <td class="text-center">1</td>
              <td class="text-center">.292</td>
            </tr>
            <tr>
              <td class=""><img src="<?php bloginfo('template_url');?>/images/icon-teams/cowboys-icon.png" class="img-fluid table-row-custom" alt="Icono Dallas Cowboys" width="25" height="25"> <span class="pl-1">Cowboys </span></td>
              <td class="text-center">3</td>
              <td class="text-center">9</td>
              <td class="text-center">0</td>
              <td class="text-center">.250</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-12 col-sm-12 col-mb-6 col-lg-6 col-xl-6">
        <h5 class="text-center">Proximos partidos</h5>
        <hr>
        <table class="table table-borderless">
          <thead class="thead-dark font-title text-center">
            <tr>
              <th scope="col" style="background-color: #00035F;">Rival</th>
              <th scope="col" class="text-center" style="background-color: #00035F;">Resultado</th>
              <th scope="col" class="text-center" style="background-color: #00035F;">Fecha</th>
            </tr>
          </thead>
          <tbody class="font-text font-size-min">
            <tr>
              <td><img src="<?php bloginfo('template_url');?>/images/icon-teams/bengals-icon.png" class="img-fluid table-row-custom" alt="Icono Cincinnati Bengals" width="25" height="25"> <span class="pl-1">Bengals </span></td>
              <td class="text-center">17-19 W</td>
              <td class="text-center">Finalizado</td>
            </tr>
            <tr>
              <td><img src="<?php bloginfo('template_url');?>/images/icon-teams/seahawks-icon.png" class="img-fluid table-row-custom" alt="Icono Seattle Seahawks" width="25" height="25"> <span class="pl-1">Seahawks </span></td>
              <td class="text-center">12-17 W</td>
              <td class="text-center">Finalizado</td>
            </tr>
            <tr>
              <td><img src="<?php bloginfo('template_url');?>/images/icon-teams/cardinals-icon.png" class="img-fluid table-row-custom" alt="Icono Arizona Cardinals" width="25" height="25"> <span class="pl-1">Cardinals </span></td>
              <td class="text-center">*</td>
              <td class="text-center">13/12 19:00</td>
            </tr>
            <tr>
              <td><img src="<?php bloginfo('template_url');?>/images/icon-teams/browns-icon.png" class="img-fluid table-row-custom" alt="Icono Cleveland Brows" width="25" height="25"> <span class="pl-1">Browns </span></td>
              <td class="text-center">*</td>
              <td class="text-center">21/12 02:20</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="container pt-4">
    <h2>Últimas crónicas</h2>
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
              <a href="<?php the_permalink(); ?>" class="stretched-link">
                <?php if (has_post_thumbnail()) the_post_thumbnail('post-thumbnails', array( 'class' => 'card-img-top img-card-cronica-principal' )) ?>
              </a>
              <div class="card-img-overlay text-right">
                    <p class="card-text text-white font-text custom-shadow">
                      <?php echo 'Hace ' . esc_html( human_time_diff( get_the_time('U'), current_time('timestamp') ) ); ?>
                    </p>
              </div>
              <div class="card-img-overlay d-flex flex-column justify-content-end custom-shadow">
                <h4 class="card-title text-white"><?php the_title(); ?></h4>
                  <p class="card-text text-white font-text">
                    Por <b><?php the_author(); ?></b>
                  </p>
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
          <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 ">
            <div class="card">
              <a href="<?php the_permalink(); ?>" class="stretched-link">
                <?php if (has_post_thumbnail()) the_post_thumbnail('post-thumbnails', array( 'class' => 'card-img-top img-card-cronica-secondary' )) ?>
              </a>
              <div class="card-img-overlay text-right">
                    <p class="card-text text-white font-text custom-shadow">
                      <?php echo 'Hace ' . esc_html( human_time_diff( get_the_time('U'), current_time('timestamp') ) ); ?>
                    </p>
              </div>
              <div class="card-img-overlay d-flex flex-column justify-content-end custom-shadow">
                <h4 class="card-title text-white"><?php the_title(); ?></h4>
                <p class="card-text text-white font-text">
                  Por <b><?php the_author(); ?></b>
                </p>
              </div>
            </div>
          </div>
        <?php endwhile; endif; ?>
    </div>
  </div>

  <div class="container pt-5">
    <h2>Últimos videos</h2>
    <hr>
    <div class="row no-gutters pt-1">
      <?php
        $posts = new WP_Query(array(
          'cat' => '5',
          'posts_per_page' => 2,
        ));
        if ($posts->have_posts() ) : while ( $posts->have_posts() ) : $posts->the_post(); ?>
          <div class="col-12 com-sm-12 col-md-12 col-lg-6 col-xl-6 pl-1 padding-videos" >
            <div class="embed-responsive embed-responsive-16by9">
              <?php the_content() ?>
            </div>
          </div>
        <?php endwhile; endif; ?>
    </div>
    <div class="row no-gutters">
      <?php
        $posts = new WP_Query(array(
          'cat' => '5',
          'posts_per_page' => 2,
          'offset' => 2,
        ));
        if ($posts->have_posts() ) : while ( $posts->have_posts() ) : $posts->the_post(); ?>
          <div class="col-12 com-sm-12 col-md-12 col-lg-6 col-xl-6 pl-1 padding-videos">
            <div class="embed-responsive embed-responsive-16by9">
              <?php the_content() ?>
            </div>
          </div>
        <?php endwhile; endif; ?>
    </div>
  </div>

  <?php get_footer()?>