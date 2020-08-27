
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
                <div class="card-img-overlay d-flex flex-column justify-content-end">
                  <h5 class="card-title text-white typography-principal"><?php the_title(); ?></h5>
                  <p class="card-text text-white typography-principal"><b> Autor:</b> <?php the_author(); ?>. <?php echo get_the_date() ?> </p>
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
                <div class="card-img-overlay d-flex flex-column justify-content-end">
                  <h5 class="card-title text-white typography"><?php the_title(); ?></h5>
                  <p class="card-text text-white typography"><b>Autor:</b> <?php the_author(); ?>. <?php echo get_the_date() ?> </p>
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
              <div class="card-img-overlay d-flex flex-column justify-content-end">
                <h5 class="card-title text-white typography-principal"><?php the_title(); ?></h5>
                <p class="card-text text-white typography-principal"><b>Autor:</b> <?php the_author(); ?>. <?php echo get_the_date() ?></p>
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
              <div class="card-img-overlay d-flex flex-column justify-content-end">
                <h5 class="card-title text-white typography"><?php the_title(); ?></h5>
                <p class="card-text text-white typography"><b>Autor:</b> <?php the_author(); ?>. <?php echo get_the_date() ?></p>
              </div>
            </div>
          </div>
        <?php endwhile; endif; ?>
    </div>
  </div>

  <div class="container pt-4">
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