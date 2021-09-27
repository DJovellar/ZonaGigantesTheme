
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

    <title>Videos sobre los New York Giants | Zona Gigantes</title>
  </head>
  <body>

    <?php get_template_part( '/template-parts/navbar', null); ?>

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
    <h1 style="font-size: 2.3rem;">Videos sobre los New York Giants</h1>
    <hr>
    <?php
        foreach($videos as $video) {
    ?>
        <div class="row pt-1">
            <div class="col-12 text-center">
                <h2 style="font-size: 1.5rem;"><?php echo $video->title?></h2>
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
