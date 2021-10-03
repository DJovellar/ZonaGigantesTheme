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

    <title>Zona Gigantes | Información de los New York Giants (NFL) en Español</title>
  </head>
  <body>

    <?php get_template_part( '/template-parts/navbar-home', null); ?>

    <div id="news" class="container pt-4 pb-4">
      <h2 style="font-size: 2.3rem;">Últimas noticias</h2>
      <hr>
      <div class="row no-gutters">
        <?php
          $posts = new WP_Query(array(
            'cat' => get_cat_ID('noticias'),
            'posts_per_page' => 2,
          ));
          if ($posts->have_posts() ) : while ( $posts->have_posts() ) : $posts->the_post(); ?>
              <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <?php
                  $args = array( 'class' => 'card-img-top img-card-principal');
                  get_template_part( '/template-parts/card', null, $args );
                ?>
              </div>
        <?php endwhile; endif; ?>
      </div>
      <div class="row no-gutters">
        <?php
            $posts = new WP_Query(array(
              'cat' => get_cat_ID('noticias'),
              'posts_per_page' => 3,
              'offset' => 2,
            ));
            if ($posts->have_posts() ) : while ( $posts->have_posts() ) : $posts->the_post(); ?>
              <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                <?php
                  $args = array( 'class' => 'card-img-top img-card-secondary' );
                  get_template_part( '/template-parts/card', 'alternative', $args );
                ?>
              </div>
          <?php endwhile; endif; ?>
      </div>
    </div>

    <div id="season" class="container pt-4">
      <div class="row">
        <div class="col-12 col-sm-12 col-mb-6 col-lg-6 col-xl-6">
          <?php get_template_part( '/template-parts/season', 'standing'); ?>
        </div>
        <div class="col-12 col-sm-12 col-mb-6 col-lg-6 col-xl-6">
          <?php get_template_part( '/template-parts/season', 'schedule'); ?>
        </div>
      </div>
    </div>

    <div id="chronicles" class="container pt-4">
      <h2 style="font-size: 2.3rem;">Últimas crónicas</h2>
      <hr>
      <div class="row no-gutters">
        <?php
          $posts = new WP_Query(array(
            'cat' => get_cat_ID('crónicas'),
            'posts_per_page' => 1,
          ));
          if ($posts->have_posts() ) : while ( $posts->have_posts() ) : $posts->the_post(); ?>
            <div class="col-12 com-sm-12 col-md-12 col-lg-12 col-xl-12">
                <?php
                  $args = array( 'class' => 'card-img-top img-card-cronica-principal');
                  get_template_part( '/template-parts/card', null, $args );
                ?>
            </div>
          <?php endwhile; endif; ?>
      </div>
      <div class="row no-gutters">
        <?php
          $posts = new WP_Query(array(
            'cat' => get_cat_ID('crónicas'),
            'posts_per_page' => 2,
            'offset' => 1,
          ));
          if ($posts->have_posts() ) : while ( $posts->have_posts() ) : $posts->the_post(); ?>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 ">
                <?php
                  $args = array( 'class' => 'card-img-top img-card-cronica-secondary' );
                  get_template_part( '/template-parts/card', null, $args );
                ?>
            </div>
          <?php endwhile; endif; ?>
      </div>
    </div>

    <div id="videos" class="container pt-5">

      <?php $last_videos = get_last_videos();
      //save_new_videos();?>

      <h2 style="font-size: 2.3rem;">Últimos videos</h2>
      <hr>
      <div class="row no-gutters pt-1">
        <div class="col-12 com-sm-12 col-md-12 col-lg-6 col-xl-6 pl-1 padding-videos" >
          <div class="embed-responsive embed-responsive-16by9">
            <?php echo $last_videos[0]->iframe ?>
          </div>
        </div>
        <div class="col-12 com-sm-12 col-md-12 col-lg-6 col-xl-6 pl-1 padding-videos" >
          <div class="embed-responsive embed-responsive-16by9">
            <?php echo $last_videos[1]->iframe ?>
          </div>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-12 com-sm-12 col-md-12 col-lg-6 col-xl-6 pl-1 padding-videos">
          <div class="embed-responsive embed-responsive-16by9">
            <?php echo $last_videos[2]->iframe ?>
          </div>
        </div>
        <div class="col-12 com-sm-12 col-md-12 col-lg-6 col-xl-6 pl-1 padding-videos">
          <div class="embed-responsive embed-responsive-16by9">
            <?php echo $last_videos[3]->iframe ?>
          </div>
        </div>
      </div>
    </div>

  <?php get_footer()?>
  <?php wp_footer() ?>