
<?php wp_head() ?>
<?php get_header() ?>

<?php
    $total_query = "SELECT COUNT(1) FROM `videos` AS combined_table";
    $total =  $wpdb->get_var( $total_query );
    $items_per_page = 4;
    $total_pages = ceil($total / $items_per_page);

    $page = isset( $_GET['page'] ) ? abs( (int) $_GET['page'] ) : 1;
    $offset = ( $page * $items_per_page ) - $items_per_page;
    $videos =  $wpdb->get_results("SELECT * FROM `videos` ORDER BY `id` DESC".  " LIMIT ${offset}, $items_per_page");

    global $wp;
    $current_url =  add_query_arg( array(), $wp->request );
?>

<div class="container pt-5">
    <h2>Videos</h2>
    <hr>
    <?php
        foreach($videos as $video) {
    ?>
        <div class="row pt-1">
            <div class="col-12 text-center">
                <h3><?php echo $video->title?></h3>
            </div>
            <div class="col-2"></div>
            <div class="col-8 pt-2 pb-2">
                <div class="embed-responsive embed-responsive-16by9">
                    <?php echo $video->iframe?>
                </div>
            </div>
        </div>
        <hr>
    <?php } ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php if ($page == 1) { ?>
                <li class="page-item active"><a class="page-link" href="#"><?php echo $page ?></a></li>
                <li class="page-item"><a class="page-link" href="<?php $current_url ?>?page=<?php echo $page+1 ?>"><?php echo $page + 1 ?></a></li>
                <li class="page-item"><a class="page-link" href="<?php $current_url ?>?page=<?php echo $page+2 ?>"><?php echo $page + 2 ?></a></li>
                <li class="page-item"><a class="page-link" href="<?php $current_url ?>?page=<?php echo $page+1 ?>">Siguiente</a></li>
            <?php } elseif($page == $total_pages ) { ?>
                <li class="page-item"><a class="page-link" href="<?php $current_url ?>?page=<?php echo $page-1 ?>">Anterior</a></li>
                <li class="page-item"><a class="page-link" href="<?php $current_url ?>?page=<?php echo $page-2 ?>"><?php echo $page - 2 ?></a></li>
                <li class="page-item"><a class="page-link" href="<?php $current_url ?>?page=<?php echo $page-1 ?>"><?php echo $page - 1 ?></a></li>
                <li class="page-item active"><a class="page-link" href="#"><?php echo $page ?></a></li>
            <?php } else { ?>
                <li class="page-item"><a class="page-link" href="<?php $current_url ?>?page=<?php echo $page-1 ?>">Anterior</a></li>
                <li class="page-item"><a class="page-link" href="<?php $current_url ?>?page=<?php echo $page-1 ?>"><?php echo $page - 1 ?></a></li>
                <li class="page-item active"><a class="page-link" href="#"><?php echo $page ?></a></li>
                <li class="page-item"><a class="page-link" href="<?php $current_url ?>?page=<?php echo $page+1 ?>"><?php echo $page + 1 ?></a></li>
                <li class="page-item"><a class="page-link" href="<?php $current_url ?>?page=<?php echo $page+1 ?>">Siguiente</a></li>
            <?php } ?>
        </ul>
    </nav>
</div>

<?php get_footer()?>
