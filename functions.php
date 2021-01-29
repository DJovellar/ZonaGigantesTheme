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

/*
  API calls for season standing and season schedule
*/

function call_API($url) {

  $curl = curl_init();

  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array(
  'Ocp-Apim-Subscription-Key:c9321f2e3ca24ffc851fc33ea70f5e3b'
  ));
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

  $result = curl_exec($curl);
  curl_close($curl);

  $result = json_decode($result);

  return $result;
}

function update_standing_NFC_East() {

  global $wpdb;
  $wpdb->query("TRUNCATE TABLE standing");

  $standings = call_API("https://api.sportsdata.io/v3/nfl/scores/json/Standings/2020REG");

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

function update_current_week() {

  $current_week = call_API("https://api.sportsdata.io/v3/nfl/scores/json/CurrentWeek");

  global $wpdb;

  $wpdb->update('params',
    array(
      'valor' => $current_week,
    ),
    array(
      'clave' => 'currentWeek'
    )
  );
}

function update_schedule() {
  global $wpdb;

  $result = $wpdb->get_results("SELECT `valor` FROM `params` WHERE `clave` LIKE 'currentWeek' ");
  $current_week = $result[0]->valor;

  $scores_week = call_API("https://api.sportsdata.io/v3/nfl/scores/json/Scores/2020REG");

  foreach($scores_week as $score_match) {

    if(($score_match->HomeTeam == 'NYG' || $score_match->AwayTeam == 'NYG') && $score_match->Week == $current_week) {

      $score_home = $score_match->HomeScoreQuarter1 + $score_match->HomeScoreQuarter2 + $score_match->HomeScoreQuarter3 + $score_match->HomeScoreQuarter4 + $score_match->HomeScoreOvertime;
      $score_away = $score_match->AwayScoreQuarter1 + $score_match->AwayScoreQuarter2 + $score_match->AwayScoreQuarter3 + $score_match->AwayScoreQuarter4 + $score_match->AwayScoreOvertime;

      $score = $score_home.'-'.$score_away;

      if ($score_match->HomeTeam == 'NYG') {
        if (($score_home - $score_away) > 0) {
          $score = $score.' W';
        } else if (($score_home - $score_away) < 0) {
          $score = $score.' L';
        } else {
          $score = $score.' T';
        }
      } else {
        if (($score_home - $score_away) > 0) {
          $score = $score.' L';
        } else if (($score_home - $score_away) < 0) {
          $score = $score.' W';
        } else {
          $score = $score.' T';
        }
      }

      $wpdb->update('schedule',
      array(
        'score' => $score,
        'date' => 'Finalizado'
      ),
      array(
        'week' => (int) $current_week
      ));

      break;
    }
  }
}

function get_schedule() {
  global $wpdb;

  $result = $wpdb->get_results("SELECT `valor` FROM `params` WHERE `clave` LIKE 'currentWeek' ");

  $current_week = (int) $result[0]->valor;

  if ($current_week == 1 || $current_week == 2) {
    $schedule = $wpdb->get_results("SELECT * FROM `schedule` ORDER BY `week` LIMIT 4");
  }
  else if($current_week == 17) {
    $schedule = $wpdb->get_results("SELECT * FROM `schedule` WHERE `week` IN (14,15,16,17) ORDER BY `week`");
  } else {
    $schedule = $wpdb->get_results("SELECT * FROM `schedule` WHERE `week` IN ($current_week-2, $current_week-1, $current_week, $current_week+1) ORDER BY `week`");
  }

  return $schedule;
}

?>