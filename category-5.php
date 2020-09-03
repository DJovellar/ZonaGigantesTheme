
<?php wp_head() ?>
<?php get_header() ?>

<div class="container pt-5">
    <h2>Videos</h2>
    <hr>
    <?php 
        if (have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="row pt-1">
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                <div class="embed-responsive embed-responsive-16by9">
                <?php the_content() ?>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 d-flex flex-column justify-content-center">
                <h4 class="text-justify"> <?php the_title() ?> </h4>
                <div class="font-text">
                    <p class="text-justify"> <?php the_excerpt() ?> </p>
                </div>
            </div>
        </div>
        <hr>
    <?php endwhile; endif; ?>
    <div class="card-body">
        <?php get_template_part( 'template-parts/content', 'paginacion') ?>
    </div>
</div>

<?php get_footer()?>