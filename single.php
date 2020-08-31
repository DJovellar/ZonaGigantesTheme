
<?php get_header() ?>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="container pt-5">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="text-center">
                        <h2><?php the_title() ?></h2>
                        <hr>
                        <?php if (has_post_thumbnail()) the_post_thumbnail('post-thumbnails', array( 'class' => 'img-fluid' )) ?>
                    </div>
                    <div class="row pt-3 lead">
                        <div class="col-10 col-sm-8 col-md-6 col-lg-5 col-xl-5">
                            <p>Por <?php the_author() ?>. <?php echo get_the_date() ?></p>
                        </div>
                        <div class="d-none d-sm-block d-md-block d-lg-block d-xl-block col-sm-2 col-md-4 col-lg-6 col-xl-6"></div>
                        <div class="col-2 col-sm-2 col-md-2 col-lg-1 col-xl-1 text-center">
                            <a href="#comments-container" class="text-decoration-none">
                                <?php comments_number( '0', '1', '%') ?>          
                                <img src="<?php bloginfo('template_url');?>/images/other-icons/comment-icon.png" class="img-fluid" height="20" width="15">
                            </a>
                        </div>
                    </div>
                    <hr>
                    <div class="text-justify">
                        <?php the_content() ?>
                    </div>

                    <div id="comments-container">
                        <?php 
                            if (comments_open() || get_comments_number()) :
                                comments_template();
                            endif;
                        ?>
                    </div>



                </div>
            </div>
        </div>
    <?php endwhile; endif; ?>

<?php get_footer() ?>