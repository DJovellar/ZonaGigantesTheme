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

if ( ! function_exists('write_log')) {
   function write_log ( $log )  {
      if ( is_array( $log ) || is_object( $log ) ) {
         error_log( print_r( $log, true ) );
      } else {
         error_log( $log );
      }
   }
}

/*
  API calls for season standing and season schedule
*/

function call_stats_API($url) {

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

  $standings = call_stats_API("https://api.sportsdata.io/v3/nfl/scores/json/Standings/2021REG");

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
add_action('update_standing', 'update_standing_NFC_East');

function update_current_week() {
  global $wpdb;

  $result = $wpdb->get_results("SELECT `valor` FROM `params` WHERE `clave` LIKE 'currentWeek' ");
  $current_week = (int) $result[0]->valor;

  if ($current_week != 17) {
    $current_week = call_stats_API("https://api.sportsdata.io/v3/nfl/scores/json/CurrentWeek");

    $wpdb->update('params',
      array(
        'valor' => $current_week,
      ),
      array(
        'clave' => 'currentWeek'
      )
    );
  }
}
add_action('update_week', 'update_current_week');

function update_schedule_NYG() {
  global $wpdb;

  $result = $wpdb->get_results("SELECT `valor` FROM `params` WHERE `clave` LIKE 'currentWeek' ");
  $current_week = $result[0]->valor;

  $scores_week = call_stats_API("https://api.sportsdata.io/v3/nfl/scores/json/Scores/2021REG");

  foreach($scores_week as $score_match) {

    if(($score_match->HomeTeam == 'NYG' || $score_match->AwayTeam == 'NYG') && $score_match->Week == $current_week && $score_match->IsOver) {

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
add_action('update_schedule', 'update_schedule_NYG');

function get_schedule() {
  global $wpdb;

  $result = $wpdb->get_results("SELECT `valor` FROM `params` WHERE `clave` LIKE 'currentWeek' ");

  $current_week = (int) $result[0]->valor;

  if ($current_week == 0 || $current_week == 1 || $current_week == 2) {
    $schedule = $wpdb->get_results("SELECT * FROM `schedule` ORDER BY `week` LIMIT 4");
  }
  else if($current_week == 17) {
    $schedule = $wpdb->get_results("SELECT * FROM `schedule` WHERE `week` IN (14,15,16,17) ORDER BY `week`");
  } else {
    $schedule = $wpdb->get_results("SELECT * FROM `schedule` WHERE `week` IN ($current_week-2, $current_week-1, $current_week, $current_week+1) ORDER BY `week`");
  }

  return $schedule;
}

/*
  API calls for get uploaded videos in Youtube
*/

function call_youtube_API($url) {

  $url = $url."&key=AIzaSyCoNT2EnZmffQc6ZvcqqHOpj_NaNGscbjY";

  $curl = curl_init();

  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

  $result = curl_exec($curl);
  curl_close($curl);

  $result = json_decode($result);

  return $result;
}

function save_all_videos() {
  global $wpdb;

  $result = call_youtube_API("https://www.googleapis.com/youtube/v3/search?part=snippet&channelId=UC9MUffNRPYDd3S2JlVXpBlw&maxResults=50&order=date&type=video");

  for ($i=49; $i >= 0 ; $i--) {

    $ids = $wpdb->get_results("SELECT id FROM `videos` ORDER BY id DESC");

    if(!empty($ids)) {
      $last_id = $ids[0]->id;
    } else {
      $last_id = 0;
    }

    $iframe = '<iframe src="https://www.youtube.com/embed/'.$result->items[$i]->id->videoId.'" frameborder="0" allowfullscreen="allowfullscreen"></iframe>';

    $wpdb->insert('videos',
      array(
      'id' => $last_id + 1,
      'id_video' => $result->items[$i]->id->videoId,
      'iframe' => $iframe,
      'title' => $result->items[$i]->snippet->title
      )
    );
  }
}
add_action('save_all_youtube_videos', 'save_all_videos');

function save_new_videos() {
  global $wpdb;

  $result = call_youtube_API("https://www.googleapis.com/youtube/v3/search?part=snippet&channelId=UC9MUffNRPYDd3S2JlVXpBlw&maxResults=3&order=date&type=video");

  for ($i=2; $i >= 0 ; $i--) {

    $ids = $wpdb->get_results("SELECT id FROM `videos` ORDER BY id DESC");

    if(!empty($ids)) {
      $last_id = $ids[0]->id;
    } else {
      $last_id = 0;
    }

    $iframe = '<iframe src="https://www.youtube.com/embed/'.$result->items[$i]->id->videoId.'" frameborder="0" allowfullscreen="allowfullscreen"></iframe>';

    $wpdb->insert('videos',
      array(
      'id' => $last_id + 1,
      'id_video' => $result->items[$i]->id->videoId,
      'iframe' => $iframe,
      'title' => $result->items[$i]->snippet->title
      )
    );
  }
}
add_action('save_new_youtube_videos', 'save_new_videos');

function get_last_videos() {
  global $wpdb;

  $videos = $wpdb->get_results("SELECT * FROM `videos` ORDER BY `id` DESC LIMIT 4");

  return $videos;
}

function get_stats_players() {
  require_once('simple_html_dom.php');

  $html = file_get_html('https://www.giants.com/team/stats/2020/REG');
  $tables = $html->find('.nfl-o-teamstats');

  foreach($tables as $table) {
    $table_title = $table->find('.nfl-o-teamstats__title', 0);
    $table_title = str_replace(' ', '', $table_title->plaintext);

    if ($table_title === 'Passing') {
      save_stats($table, 'stats_passing');
    }

    if ($table_title === 'Rushing') {
      save_stats($table, 'stats_rushing');
    }

    if ($table_title === 'Receiving') {
      save_stats($table, 'stats_receiving');
    }

  }
}

function save_stats($table, $table_title) {
    global $wpdb;
    $headers = $table->find('tr', 0);
    $players = $table->find('tr');

    $wpdb->query('START TRANSACTION');

    $wpdb->query("DELETE FROM $table_title");

    foreach($players as $index=>$player) {
      if ($index == 0) {
        // Es la fila de cabeceras
        continue;
      }

      $data = array();

      foreach($headers->children() as $index2=>$header_aux) {
        $header = str_replace(' ', '', $header_aux->plaintext);

        if ($header === 'Player') {
          $value_aux = $player->children($index2)->children(0)->children(1)->plaintext;
          $value = trim($value_aux);

          $photo_aux = str_replace(' ', '-', $value);
          $photo = $photo_aux.".png";
        } else {
          $value_aux = $player->children($index2)->plaintext;
          $value = trim($value_aux);
        }

        $data[$header] = $value;
        $data['Photo'] = $photo;
      }

      $error = $wpdb->insert($table_title, $data);

      if ($error) {
        write_log("CUSTOM:: Player {$data['Player']} updated in table {$table_title}");
        $wpdb->query('COMMIT');
      } else {
        write_log("CUSTOM:: Player {$data['Player']} not updated in table {$table_title}");
        $wpdb->query('ROLLBACK');
      }
    }
}

?>
