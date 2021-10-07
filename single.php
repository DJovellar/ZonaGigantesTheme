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

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5587252274862258"
        crossorigin="anonymous"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-177599573-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-177599573-1');
    </script>

    <title> <?php the_title() ?> | Zona Gigantes </title>
  </head>
  <body>

    <?php get_template_part( '/template-parts/navbar', null); ?>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="container pt-5 pb-5">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="text-center">
                        <h1><?php the_title() ?></h1>
                        <hr>
                        <?php if (has_post_thumbnail()) the_post_thumbnail('post-thumbnails', array( 'class' => 'img-fluid w-100' )) ?>
                    </div>
                    <div class="row pt-3 font-text">
                        <div class="col-10 col-sm-8 col-md-6 col-lg-5 col-xl-5">
                            <span> Por <b> <?php the_author() ?> </b> / <?php echo get_the_date() ?></span>
                        </div>
                        <div class="d-none d-sm-block d-md-block d-lg-block d-xl-block col-sm-2 col-md-4 col-lg-6 col-xl-6"></div>
                        <div class="col-2 col-sm-2 col-md-2 col-lg-1 col-xl-1 text-center">
                            <a href="#comments-container" class="text-decoration-none text-black-50">
                                <?php comments_number( '0', '1', '%') ?>
                                <img src="<?php bloginfo('template_url');?>/images/other-icons/comment-icon.png" class="img-fluid" height="20" width="15">
                            </a>
                        </div>
                    </div>
                    <hr>
                    <div class="text-justify font-text">
                        <?php the_content() ?>
                    </div>

                    <div class="pt-3 pb-3">
                        <p class="font-weight-bold font-text">Si te ha gustado este articulo, igual tambien te gustan los siguientes:</p>
                        <div class="row">
                            <?php
                                $post_title = get_post_field('post_title');
                                $category = get_the_category()[0]->cat_ID;

                                $posts1 = new WP_Query(array(
                                'cat' => $category,
                                'posts_per_page' => 3,
                                ));

                                $posts_aux = $posts1->posts;

                                foreach($posts_aux as $index=>$post_aux) {
                                    if ($post_aux->post_title == $post_title) {
                                        if ($index == 0) {
                                            $posts1 = new WP_Query(array(
                                                'cat' => $category,
                                                'posts_per_page' => 3,
                                                'offset' => 1
                                            ));
                                        } else if ($index == 1) {
                                            $posts2 = new WP_Query(array(
                                                'cat' => $category,
                                                'posts_per_page' => 1
                                            ));
                                            $posts3 = new WP_Query(array(
                                                'cat' => $category,
                                                'posts_per_page' => 2,
                                                'offset' => 2
                                            ));
                                            $posts1->posts = array_merge($posts2->posts, $posts3->posts);
                                        } else if ($index == 2) {
                                            $posts2 = new WP_Query(array(
                                                'cat' => $category,
                                                'posts_per_page' => 2
                                            ));
                                            $posts3 = new WP_Query(array(
                                                'cat' => $category,
                                                'posts_per_page' => 1,
                                                'offset' => 3
                                            ));
                                            $posts1->posts = array_merge($posts2->posts, $posts3->posts);
                                        }
                                    }
                                }

                                if ($posts1->have_posts() ) : while ( $posts1->have_posts() ) : $posts1->the_post(); ?>
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <?php
                                    $args = array( 'class' => 'card-img-top img-card-secondary' );
                                    get_template_part( '/template-parts/card', 'interlinking', $args );
                                    ?>
                                </div>
                            <?php endwhile; endif; ?>
                        </div>
                    </div>

                    <div id="comments-container pt-5">
                        <?php
                            // If comments are open or we have at least one comment, load up the comment template.
				            if ( comments_open() || get_comments_number() ) {
					            comments_template();
				            }
                        ?>
                    </div>



                </div>
            </div>
        </div>
    <?php endwhile; endif; ?>

<?php get_footer() ?>

<?php wp_footer() ?>