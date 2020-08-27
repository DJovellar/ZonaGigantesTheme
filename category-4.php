
<?php get_header() ?>

<div class="container pt-5">
    <h2>Crónicas</h2>
    <hr>
    <?php 
        $posts = new WP_Query(array(
        'cat' => '4',
        ));
        if ($posts->have_posts() ) : while ( $posts->have_posts() ) : $posts->the_post(); ?>
        <div class="row pt-1">
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                <?php if (has_post_thumbnail()) the_post_thumbnail('post-thumbnails', array( 'class' => 'img-fluid' )) ?>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 d-flex flex-column justify-content-center">
                <h4> <?php the_title() ?> </h4>
                <p> <?php the_excerpt() ?> </p>
                <div class="row">
                    <div class="col-12 text-right">
                        <a href="<?php the_permalink() ?>"><button class="btn btn-primary btn-sm" >Leer mas</button></a> 
                    </div>
                </div>
            </div>
        </div>
        <hr>
    <?php endwhile; endif; ?>
</div>

<?php get_footer()?>