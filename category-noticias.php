
<?php wp_head() ?>
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


    <title>Noticias de los New York Giants (NFL) | Zona Gigantes</title>
  </head>
  <body>

    <?php get_template_part( '/template-parts/navbar', null); ?>

    <div class="container pt-5">
        <h1 style="font-size: 2.3rem;">Noticias de los New York Giants</h1>
        <hr>
        <?php
            if (have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="row pt-1">
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                    <?php if (has_post_thumbnail()) the_post_thumbnail('post-thumbnails', array( 'class' => 'img-card-secondary' )) ?>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 d-flex flex-column justify-content-center">
                    <h2 style="font-size: 1.5rem;"> <?php the_title() ?> </h2>

                    <div class="font-text">
                        <p><?php the_excerpt() ?></p>
                    </div>
                    <div class="row">
                        <div class="col-12 font-text">
                            Por <b><?php the_author(); ?></b>
                            <span style="float: right"><a href="<?php the_permalink() ?>"><button class="btn btn-primary btn-sm" >Leer mas</button></a> </span>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        <?php endwhile; endif; ?>

        <div class="pt-2 pb-2">
            <?php get_template_part('template-parts/content', 'paginacion') ?>
        </div>
    </div>

<?php get_footer()?>