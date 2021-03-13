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