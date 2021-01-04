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

function get_standings_for_API() {

  $curl = curl_init();

  curl_setopt($curl, CURLOPT_URL, "https://api.sportsdata.io/v3/nfl/scores/json/Standings/2020REG");
  curl_setopt($curl, CURLOPT_HTTPHEADER, array(
  'Ocp-Apim-Subscription-Key:c9321f2e3ca24ffc851fc33ea70f5e3b'
  ));
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

  $result = curl_exec($curl);
  curl_close($curl);

  $result = json_decode($result);

  return $result;
}

//Actualizar envez de insertar!!!!!!!!!!!!!!!!!!!!!!!!!

function get_standing_NFC_East() {

  $standings = get_standings_for_API();

  global $wpdb;

  foreach($standings as $standing) {

    if ($standing->Conference == 'NFC' && $standing->Division == 'East') {

      if ($standing->Team == 'NYG') {

        $wpdb->insert('standing',
          array(
          'Name'=> 'Giants',
          'Division' => 'giants-icon.png',
          'Win' => $standing->Wins,
          'Losses' => $standing->Losses,
          'Ties' => $standing->Ties,
          'Percentage' => $standing->Percentage
          )
        );
      }

      if ($standing->Team == 'WAS') {
        $wpdb->insert('standing',
          array(
          'Name'=> 'Washington',
          'Division' => 'washington-icon2.png',
          'Win' => $standing->Wins,
          'Losses' => $standing->Losses,
          'Ties' => $standing->Ties,
          'Percentage' => $standing->Percentage
          )
        );
      }

      if ($standing->Team == 'PHI') {
        $wpdb->insert('standing',
          array(
          'Name'=> 'Eagles',
          'Division' => 'eagles-icon.png',
          'Win' => $standing->Wins,
          'Losses' => $standing->Losses,
          'Ties' => $standing->Ties,
          'Percentage' => $standing->Percentage
          )
        );
      }

      if ($standing->Team == 'DAL') {
        $standing->Name = 'Cowboys';
        $standing->Division = 'cowboys-icon.png';
        $wpdb->insert('standing',
          array(
          'Name'=> 'Cowboys',
          'Division' => 'cowboys-icon.png',
          'Win' => $standing->Wins,
          'Losses' => $standing->Losses,
          'Ties' => $standing->Ties,
          'Percentage' => $standing->Percentage
          )
        );
      }

    }
  }



}

?>