
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
                  <h5 class="card-title text-white"><?php the_title(); ?></h5>
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
          <thead class="thead-dark font-title">
            <tr>
              <th scope="col" style="padding-left: 70px; background-color: #00035F;">Equipo</th>
              <th scope="col" class="text-center" style="background-color: #00035F;">W</th>
              <th scope="col" class="text-center" style="background-color: #00035F;">L</th>
              <th scope="col" class="text-center" style="background-color: #00035F;">Tie</th>
              <th scope="col" class="text-center" style="background-color: #00035F;">%</th>
            </tr>
          </thead>
          <tbody class="font-text">
            <tr >
              <td class="pl-5"><img src="<?php bloginfo('template_url');?>/images/icon-teams/cowboys-icon.png" class="img-fluid" alt="Icono Dallas Cowboys" width="25" height="25"> <span class="pl-2">Cowboys </span></td>
              <td class="text-center">0</td>
              <td class="text-center">0</td>
              <td class="text-center">0</td>
              <td class="text-center">.000</td>
            </tr>
            <tr>
              <td class="pl-5"><img src="<?php bloginfo('template_url');?>/images/icon-teams/giants-icon.png" class="img-fluid" alt="Icono New York Giants" width="25" height="25"> <span class="pl-2">Giants</span></td>
              <td class="text-center">0</td>
              <td class="text-center">0</td>
              <td class="text-center">0</td>
              <td class="text-center">.000</td>
            </tr>
            <tr>
              <td class="pl-5"><img src="<?php bloginfo('template_url');?>/images/icon-teams/eagles-icon.png" class="img-fluid" alt="Icono Philadelphia Eagles" width="25" height="25"> <span class="pl-2">Eagles </span></td>
              <td class="text-center">0</td>
              <td class="text-center">0</td>
              <td class="text-center">0</td>
              <td class="text-center">.000</td>
            </tr>
            <tr>
              <td class="pl-5"><img src="<?php bloginfo('template_url');?>/images/icon-teams/washington-icon.png" class="img-fluid" alt="Icono Washington Football Team" width="25" height="25"> <span class="pl-2">Washington </span></td>
              <td class="text-center">0</td>
              <td class="text-center">0</td>
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
          <thead class="thead-dark font-title">
            <tr>
              <th scope="col" style="padding-left: 70px; background-color: #00035F;">Rival</th>
              <th scope="col" class="text-center" style="background-color: #00035F;">Resultado</th>
              <th scope="col" class="text-center" style="background-color: #00035F;">Fecha</th>
            </tr>
          </thead>
          <tbody class="font-text">
            <tr>
              <td class="pl-5"><img src="<?php bloginfo('template_url');?>/images/icon-teams/steelers-icon.png" class="img-fluid" alt="Icono Pittsburgh Steelers" width="25" height="25"> <span class="pl-2">Steelers </span></td>
              <td class="text-center">*</td>
              <td class="text-center">15/09 01:15</td>
            </tr>
            <tr>
              <td class="pl-5"><img src="<?php bloginfo('template_url');?>/images/icon-teams/bears-icon.png" class="img-fluid" alt="Icono Pittsburgh Steelers" width="25" height="25"> <span class="pl-2">Bears</span></td>
              <td class="text-center">*</td>
              <td class="text-center">20/09 19:00</td>
            </tr>
            <tr>
              <td class="pl-5"><img src="<?php bloginfo('template_url');?>/images/icon-teams/49ers-icon.png" class="img-fluid" alt="Icono Pittsburgh Steelers" width="25" height="25"> <span class="pl-2">49ers </span></td>
              <td class="text-center">*</td>
              <td class="text-center">27/09 19:00</td>
            </tr>
            <tr>
              <td class="pl-5"><img src="<?php bloginfo('template_url');?>/images/icon-teams/rams-icon.png" class="img-fluid" alt="Icono Pittsburgh Steelers" width="25" height="25"> <span class="pl-2">Rams </span></td>
              <td class="text-center">*</td>
              <td class="text-center">04/10 22:05</td>
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
                <h5 class="card-title text-white"><?php the_title(); ?></h5>
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