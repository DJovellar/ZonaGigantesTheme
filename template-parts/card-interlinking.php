<a href="<?php the_permalink(); ?>" class="stretched-link text-decoration-none" style="color: black;">
    <div class="card custom-shadow">
        <?php if (has_post_thumbnail()) the_post_thumbnail('post-thumbnails', array( 'class' => 'card-img-top img-card-secondary' )) ?>
    </div>
    <h3 class="font-title text-center pt-3" style="font-size: 1.3rem;"><?php the_title(); ?></h3>
</a>