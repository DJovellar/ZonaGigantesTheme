

<h5 class="text-center pt-5">Comentarios</h5>
<hr>

<div >

</div>

<?php 
    $comments_args = array(
            'fields' => array(
                //Author field
                'author' => '<p class="comment-form-author pt-3"><label class="custom-label" for="author">' . _x( 'Nombre', 'noun' ) . '</label><input id="author" name="author" aria-required="true" placeholder="" value="' . $comment_author .'"></input></p>',
                //Email Field
                'email' => '<p class="comment-form-email"><label class="custom-label" for="email">' . _x( 'Email', 'noun' ) . '</label><input id="email" name="email" value="' . $comment_email .'"></input></p>',
                //URL Field
                'url' => '',
                //Cookies
                'cookies' => '<input type="checkbox" required> </input><label class="pl-2">Guardar mi nombre y email en este navegador para la proxima vez que comente</label>',
            ),
            'label_submit' => __( 'Publicar', 'textdomain' ),
            'title_reply' => __( 'Nuevo comentario', 'textdomain' ),
            'comment_notes_before' => '',
            'comment_notes_after' => '<strong>El nombre y el email son obligatorios, solo publicaremos tu nombre.</strong>',
            'comment_field' => '<p class="comment-form-comment pt-2"><textarea id="comment" name="comment" rows="4" placeholder="Escribe un comentario" aria-required="true"></textarea></p>',
    );
?>

<?php wp_list_comments( array(
    'callback' => function( $comment, $args, $depth ) { ?>
        <div class="media">
            <div class="mr-3">
                <?php if ( $args['avatar_size'] != 0) {
                    echo get_avatar( $comment, $args['avatar_size']); }
                ?>
            </div>
            <div class="media-body">
                <h5 class="mt-0">
                    <?php printf( get_comment_author()); ?>
                </h5>
                <?php comment_text() ?>

                <span>
                    <?php comment_reply_link( array_merge($args, array(
                        'reply_text' => __('Responder', 'textdomain'),
                        'depth'      => $depth,
                        'max_depth'  => $args['max_depth']
                        )
                    )); ?>
                </span>
            </div>
        </div>
        <hr>
    <?php }
    )); ?>
    <?php comment_form( $comments_args ) ?>