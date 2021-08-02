
<?php wp_head() ?>
<?php get_header(); ?>

  <div id="news" class="container pt-4 pb-4">
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
            'cat' => '3',
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
          'cat' => '4',
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

    <h2>Últimos videos</h2>
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