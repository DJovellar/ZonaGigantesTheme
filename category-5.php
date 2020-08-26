
<?php get_header() ?>

<div class="container pt-5">
    <h2>Videos</h2>
    <hr>
    <?php 
        $posts = new WP_Query(array(
        'cat' => '5',
        ));
        if ($posts->have_posts() ) : while ( $posts->have_posts() ) : $posts->the_post(); ?>
        <div class="row pt-1">
            <div class="col-12 col-sm-12 col-md-4 col-xl-4">
                <div class="embed-responsive embed-responsive-16by9">
                <?php the_content() ?>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-8 col-xl-8 d-flex flex-column justify-content-center">
                <h4 class="text-justify"> <?php the_title() ?> </h4>
                <p class="text-justify"> <?php the_excerpt() ?> </p>
            </div>
        </div>
        <hr>
    <?php endwhile; endif; ?>
</div>

<?php get_footer()?>