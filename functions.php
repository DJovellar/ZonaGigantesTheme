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
        'score' => $score
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

    if ($table_title === 'Tackles') {
      save_stats($table, 'stats_defense_tackles');
    }

    if ($table_title === 'Interceptions') {
      save_stats($table, 'stats_defense_ints');
    }

  }
}
add_action('get_stats_players', 'get_stats_players');

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
        write_log("save_stats:: Player {$data['Player']} updated in table {$table_title}");
        $wpdb->query('COMMIT');
      } else {
        write_log("save_stats:: Player {$data['Player']} not updated in table {$table_title}");
        $wpdb->query('ROLLBACK');
      }
    }
}

function get_stats_match() {
  require_once('simple_html_dom.php');

  global $wpdb;
  $week_aux = $wpdb->get_results("SELECT `valor` FROM `params` WHERE `clave` LIKE 'currentWeek' ");
  $current_week = (int) $week_aux[0]->valor;

  $match = $wpdb->get_results("SELECT * FROM `schedule` WHERE `week` = $current_week");

  if ($match != null) {
    $url = get_url_cbs($match[0]);

    // https://www.cbssports.com/nfl/gametracker/boxscore/NFL_20200914_PIT@NYG/
    $html = file_get_html($url);

    if ($html != null) {
      $stats_teams_match = $html->find('.team-stats', 0);
      $stats_players_match = $html->find('.player-stats-container', 0);

      get_stats_match_teams($match, $current_week, $stats_teams_match);
      get_stats_match_players($match, $current_week, $stats_players_match);

    } else {
      write_log("get_stats_match:: The url: '{$url}' of the mach is wrong");
    }
  } else {
    write_log("get_stats_match:: The match in the Week {$current_week} not exists in the Schedule table");
  }
}
add_action('get_stats_match', 'get_stats_match');

function get_stats_match_teams($match, $current_week, $data) {
  $data_home = array();
  $data_away = array();

  if ($match[0]->home == 1) {
    $data_home['Team'] = 'Giants';
    $data_away['Team'] = $match[0]->rival;
  } else {
    $data_home['Team'] = $match[0]->rival;
    $data_away['Team'] = 'Giants';
  }

  $data_home['Week'] = $current_week;
  $data_away['Week'] = $current_week;

  $stats = $data->find('.stat-category');

  foreach($stats as $stat) {
    $header = $stat->children(0)->plaintext;
    $data_home[$header] = str_replace(' ', '', $stat->children(1)->plaintext);
    $data_away[$header] = str_replace(' ', '', $stat->children(2)->plaintext);
  }

  global $wpdb;
  $wpdb->query('START TRANSACTION');

  $wpdb->insert('stats_match_teams', $data_home);
  $wpdb->insert('stats_match_teams', $data_away);

  $wpdb->query('COMMIT');
}

function get_stats_match_players($match, $current_week, $data) {
  $data_home = array();
  $data_away = array();

  if ($match[0]->home == 1) {
    $data_home['Team'] = 'Giants';
    $data_away['Team'] = $match[0]->rival;
  } else {
    $data_home['Team'] = $match[0]->rival;
    $data_away['Team'] = 'Giants';
  }

  $data_home['Week'] = $current_week;
  $data_away['Week'] = $current_week;

  // No es un error, salen al reves en el HTML
  $stats_home = $data->find('#player-stats-away', 0);
  $stats_away = $data->find('#player-stats-home', 0);

  $table = $stats_home->find('.passing-ctr', 0);
  $data_home['Type'] = 'Passing';
  get_stats_by_position($table, $data_home);

  $table = $stats_home->find('.rushing-ctr', 0);
  $data_home['Type'] = 'Rushing';
  get_stats_by_position($table, $data_home);

  $table = $stats_home->find('.receiving-ctr', 0);
  $data_home['Type'] = 'Receiving';
  get_stats_by_position($table, $data_home);

  $table = $stats_home->find('.defense-ctr', 0);
  $data_home['Type'] = 'Defense';
  get_stats_by_position($table, $data_home);

  $table = $stats_away->find('.passing-ctr', 0);
  $data_away['Type'] = 'Passing';
  get_stats_by_position($table, $data_away);

  $table = $stats_away->find('.rushing-ctr', 0);
  $data_away['Type'] = 'Rushing';
  get_stats_by_position($table, $data_away);

  $table = $stats_away->find('.receiving-ctr', 0);
  $data_away['Type'] = 'Receiving';
  get_stats_by_position($table, $data_away);

  $table = $stats_away->find('.defense-ctr', 0);
  $data_away['Type'] = 'Defense';
  get_stats_by_position($table, $data_away);

}

function get_stats_by_position($table, $data) {

  global $wpdb;

  $headers_aux = $table->find('.stats-header', 0);
  $headers = $headers_aux->find('td');

  $players = $table->find('.data-row');

  $wpdb->query('START TRANSACTION');

  foreach($players as $player) {
    foreach($player->children() as $index=>$stat) {
      if ($index == 0) {
        continue;
      }

      if ($index == 1) {
        $name_aux = str_replace(' ', '', $stat->children(0)->children(0)->plaintext);

        $name_split = explode('.', $name_aux);
        $name = $name_split[0].'. '.$name_split[1];

        $data['Player'] = $name;
      } else {
        $key_aux = $headers[$index - 1]->plaintext;
        $key = str_replace(' ', '', $key_aux);

        $data[$key] = str_replace(' ', '', $stat->plaintext);
      }
    }

    $error = $wpdb->insert('stats_match_players', $data);

  }
  $wpdb->query('COMMIT');
}

function get_url_cbs($match) {
    $rival = $match->rival;
    $date = $match->date;

    $date_aux = explode(' ', $date);
    $date_aux2 = explode('/', $date_aux[0]);

    if ($date_aux[1] == '02:20' || $date_aux[1] == '01:15' || $date_aux[1] == '02:15') {
      $date_int = (int) $date_aux2[0] - 1;
      $date_str = strval($date_int);

      if (strlen($date_str) < 2) {
        $date_aux2[0] = '0'.$date_str;
      } else {
        $date_aux2[0] = $date_str;
      }
    }

    if ($date_aux2[1] == '01' || $date_aux2[1] == '02' || $date_aux2[1] == '03') {
      $year = 'NFL_2022';
    } else {
      $year = 'NFL_2021';
    }

    $date_formatted = $year.$date_aux2[1].$date_aux2[0].'_';

    $rival_shortcut = find_shortcut($rival);

    if ($match->home == 1) {
      $date_formatted = $date_formatted.'NYG@'.$rival_shortcut;
    } else {
      $date_formatted = $date_formatted.$rival_shortcut.'@NYG';
    }

    $url = 'https://www.cbssports.com/nfl/gametracker/boxscore/'.$date_formatted;

    return $url;
}

function find_shortcut($rival) {
  $shorcut = '';

  if ($rival == 'Steelers') {
    $shorcut = 'PIT';
  }

  if ($rival == 'Bears') {
    $shorcut = 'CHI';
  }

  if ($rival == '49ers') {
    $shorcut = 'SF';
  }

  if ($rival == 'Rams') {
    $shorcut = 'LAR';
  }

  if ($rival == 'Cowboys') {
    $shorcut = 'DAL';
  }

  if ($rival == 'Broncos') {
    $shorcut = 'DEN';
  }

  if ($rival == 'Washington') {
    $shorcut = 'WAS';
  }

  if ($rival == 'Falcons') {
    $shorcut = 'ATL';
  }

  if ($rival == 'Saints') {
    $shorcut = 'NO';
  }

  if ($rival == 'Panthers') {
    $shorcut = 'CAR';
  }

  if ($rival == 'Chiefs') {
    $shorcut = 'KC';
  }

  if ($rival == 'Raiders') {
    $shorcut = 'LV';
  }

  if ($rival == 'Buccaneers') {
    $shorcut = 'TB';
  }

  if ($rival == 'Eagles') {
    $shorcut = 'PHI';
  }

  if ($rival == 'Dolphins') {
    $shorcut = 'MIA';
  }

  if ($rival == 'Chargers') {
    $shorcut = 'LAC';
  }

  return $shorcut;
}

?>
