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


?>