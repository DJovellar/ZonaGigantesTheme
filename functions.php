<?php

// Creamos el menu
if (function_exists('register_nav_menus')) {
  register_nav_menus(array('principal' => 'Menu Principal'));
}

// Clase para <a>
add_filter('nav_menu_link_attributes', 'funcion_auxiliar', 10, 3);
function funcion_auxiliar ($atts, $item, $args) {
    $class = 'nav-link mx-3';
    $atts['class'] = $class;
    return $atts;
}

// Imagen destacada de la entrada
if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
}

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
  if (in_array('current-menu-item', $classes) ){
    $classes[] = 'active';
  }
  return $classes;
}

function wpb_add_google_fonts() {
  wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css2?family=Russo+One&display=swap', false );
}
add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts');

function time_ago( $type = 'post' ) {
  $d = 'comment' == $type ? 'get_comment_time' : 'get_post_time';

  return human_time_diff($d('U'), current_time('timestamp')) . " " . __('ago');

}


?>