
<h5 class="text-center pt-5">Comentarios</h5>
<hr>

<?php 
    $comments_args = array(
            'fields' => array(
                //Author field
                'author' => '<p class="comment-form-author pt-3"><label class="custom-label font-text" for="author">' . _x( 'Nombre', 'noun' ) . '</label><input id="author" name="author" aria-required="true" placeholder="" value="' . $comment_author .'"></input></p>',
                //Email Field
                'email' => '<p class="comment-form-email"><label class="custom-label font-text" for="email">' . _x( 'Email', 'noun' ) . '</label><input id="email" name="email" value="' . $comment_email .'"></input></p>',
                //URL Field
                'url' => '',
                //Cookies
                'cookies' => '<input type="checkbox" required> </input><label class="pl-2 font-text">Guardar mi nombre y email en este navegador para la proxima vez que comente</label>',
            ),
            'label_submit' => __( 'Publicar', 'textdomain' ),
            'title_reply' => __( '', 'textdomain' ),
            'comment_notes_before' => '',
            'comment_notes_after' => '<strong class="font-text">El nombre y el email son obligatorios, solo publicaremos tu nombre.</strong>',
            'comment_field' => '<p class="comment-form-comment pt-2"><textarea id="comment" name="comment" rows="4" placeholder="Escribe un comentario" aria-required="true"></textarea></p>',
    );
?>

<?php comment_form( $comments_args ) ?>
<hr>

<?php if(get_comments_number() == 0) { ?>
    <div class="text-center">No hay comentarios</div>
<?php } ?>

<?php wp_list_comments( array(
    'callback' => function( $comment, $args, $depth ) { ?>
        <div class="media comment">
            <div class="mr-3">
                <?php if ( $args['avatar_size'] != 0) {
                    echo get_avatar( $comment, $args['avatar_size']); }
                ?>
            </div>
            <div class="media-body">
                <h5 class="pt-2">
                    <?php printf( get_comment_author()); ?>
                    <small class="font-text" style="float: right;"> <?php echo 'Hace ' . esc_html( human_time_diff( strtotime( $comment->comment_date ), current_time('timestamp') ) ); ?></small>
                </h5>
                
                <div class="font-text pt-1">
                    <?php comment_text() ?>
                </div>

                <div>
                    <?php comment_reply_link( array_merge($args, array(
                        'add_below' => 'comment',
                        'reply_text' => __('Responder', 'textdomain'),
                        'depth'      => $depth,
                        'max_depth'  => $args['max_depth']
                        )
                    )); ?>
                </div>
            </div>
        </div>
        <hr>
<?php }
)); ?>    

<body>
    <script type="text/javascript" src="<?php bloginfo('template_url');?>/js/app.js?ver=<?php echo rand(111,999)?>"></script>
</body>