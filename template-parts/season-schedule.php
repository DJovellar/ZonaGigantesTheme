
<?php
    $schedule = get_schedule();
?>

<h5 class="text-center">Proximos partidos</h5>
<hr>

<div class="scrollable">
    <table class="table table-borderless" id="table_schedule">
        <thead class="thead-dark font-title text-center">
        <tr>
            <th scope="col" style="background-color: #00035F;">Rival</th>
            <th scope="col" class="text-center" style="background-color: #00035F;">Resultado</th>
            <th scope="col" class="text-center" style="background-color: #00035F;">Fecha</th>
        </tr>
        </thead>
        <tbody class="font-text font-size-min prova">
            <?php
                foreach($schedule as $match) { ?>
                    <tr tabindex=0>
                        <td>
                            <img src="<?php bloginfo('template_url');?>/images/icon-teams/<?php echo $match->icon ?>" class="img-fluid table-row-custom" width="25" height="25">
                            <span class="pl-1"><?php echo $match->rival ?></span>
                        </td>
                        <td class="text-center"><?php echo $match->score ?></td>
                        <td class="text-center">
                            <?php if ($match->score == '*') { ?>
                                <?php echo $match->date ?>
                            <?php } else { ?>
                                <button type="button" class="btn color-giants text-white btn-sm btnStats">Stats</button>
                            <?php } ?>
                        </td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<div class="modal fade" id="matchModal">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content" style="max-height: 947px;">
            <div class="modal-header justify-content-center">
                <h2 class="modal-title" id="postModalLabel"><span class="Team_home"></span> vs <span class="Team_away"></span></h2>
            </div>
            <div class="modal-body pt-1">
                <nav class="nav nav-pills flex-column flex-sm-row">
                    <a class="flex-sm-fill text-sm-center nav-link shadow Team_home" aria-controls="profile" data-toggle="tab" role="tab" href="#home"></a>
                    <a class="flex-sm-fill text-sm-center nav-link active shadow" aria-controls="home" data-toggle="tab" role="tab" href="#general" id="first_tab">General</a>
                    <a class="flex-sm-fill text-sm-center nav-link shadow Team_away" aria-controls="profile2" data-toggle="tab" role="tab" href="#away"></a>
                </nav>

                <div class="tab-content pt-4">
                    <div role="tabpanel" class="tab-pane fade show active" id="general">
                        <div class="table">
                            <div class="row">
                                <div class="col-4 text-center font-text-stats-match font-title"><img id="icon_home" src=""></div>
                                <div class="col-4 text-center font-text-stats-match"></div>
                                <div class="col-4 text-center font-text-stats-match font-title"><img id="icon_away" src=""></div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-4 text-center font-text-stats-match TOTAL-NET-YARDS_home"></div>
                                <div class="col-4 text-center font-text-stats-match font-weight-bold">Yardas totales</div>
                                <div class="col-4 text-center font-text-stats-match TOTAL-NET-YARDS_away"></div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-4 text-center font-text-stats-match NET-YARDS-PASSING_away"></div>
                                <div class="col-4 text-center font-text-stats-match font-weight-bold">Yardas de pase</div>
                                <div class="col-4 text-center font-text-stats-match NET-YARDS-PASSING_away"></div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-4 text-center font-text-stats-match NET-YARDS-RUSHING_home"></div>
                                <div class="col-4 text-center font-text-stats-match font-weight-bold">Yardas de carrera</div>
                                <div class="col-4 text-center font-text-stats-match NET-YARDS-RUSHING_away"></div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-4 text-center font-text-stats-match 1ST-DOWNS_home"></div>
                                <div class="col-4 text-center font-text-stats-match font-weight-bold">1eros downs</div>
                                <div class="col-4 text-center font-text-stats-match 1ST-DOWNS_away"></div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-4 text-center font-text-stats-match 3RD-DOWN-CONV_home"></div>
                                <div class="col-4 text-center font-text-stats-match font-weight-bold">3eros downs</div>
                                <div class="col-4 text-center font-text-stats-match 3RD-DOWN-CONV_away"></div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-4 text-center font-text-stats-match 4TH-DOWN-CONV_home"></div>
                                <div class="col-4 text-center font-text-stats-match font-weight-bold">4tos downs</div>
                                <div class="col-4 text-center font-text-stats-match 4TH-DOWN-CONV_away"></div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-4 text-center font-text-stats-match TOUCHDOWNS_home"></div>
                                <div class="col-4 text-center font-text-stats-match font-weight-bold">Touchdowns</div>
                                <div class="col-4 text-center font-text-stats-match TOUCHDOWNS_away"></div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-4 text-center font-text-stats-match TURNOVERS_home"></div>
                                <div class="col-4 text-center font-text-stats-match font-weight-bold">Turnovers</div>
                                <div class="col-4 text-center font-text-stats-match TURNOVERS_away"></div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-4 text-center font-text-stats-match RED-ZONE-EFF_home"></div>
                                <div class="col-4 text-center font-text-stats-match font-weight-bold">Red zone</div>
                                <div class="col-4 text-center font-text-stats-match RED-ZONE-EFF_away"></div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-4 text-center font-text-stats-match PENALTIES---YARDS_home"></div>
                                <div class="col-4 text-center font-text-stats-match font-weight-bold">Penalizaciones - Yardas</div>
                                <div class="col-4 text-center font-text-stats-match PENALTIES---YARDS_away"></div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-4 text-center font-text-stats-match TIME-OF-POS_home"></div>
                                <div class="col-4 text-center font-text-stats-match font-weight-bold">Tiempo de posesión</div>
                                <div class="col-4 text-center font-text-stats-match TIME-OF-POS_away"></div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="away">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-sm-12 text-center">
                                <h5>Pase</h5>
                                <table class="table table-players" id="passTable_away">
                                </table>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-12  text-center">
                                <h5>Carrera</h5>
                                <table class="table table-players" id="rushTable_away">
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-sm-12 text-center">
                                <h5>Recepciones</h5>
                                <table class="table table-players" id="receivingTable_away">
                                </table>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-12 text-center">
                                <h5>Defensa</h5>
                                <table class="table table-players" id="defenseTable_away">
                                </table>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="home">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-sm-12 text-center">
                                <h5>Pase</h5>
                                <table class="table table-players" id="passTable_home">
                                </table>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-12 text-center">
                                <h5>Carrera</h5>
                                <table class="table table-players" id="rushTable_home">
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-sm-12 text-center">
                                <h5>Recepciones</h5>
                                <table class="table table-players" id="receivingTable_home">
                                </table>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-12 text-center">
                                <h5>Defensa</h5>
                                <table class="table table-players" id="defenseTable_home">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-center" style="border-top: 0 none;">
                <button type="button" class="btn color-giants text-white btnClose">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="noDataModal">
    <div class="modal-dialog modal modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title" id="postModalLabel">Info</h5>
            </div>
            <div class="modal-body text-center">
                <span>La información relacionada con este partido todavia no esta disponible, vuelve mas tarde.</span>
            </div>
            <div class="modal-footer justify-content-center" style="border-top: 0 none;">
                <button type="button" class="btn color-giants text-white btnClose">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<script>
    jQuery(document).ready(function($) {

        focus_week();

        var week;
        $('.btnStats').on('click', function() {
            var index = $(this).closest('tr').index();
            week = index + 1;

            var params = {
                'action': 'get_stats_match_click',
                'week': week
            };

            var url = '<?php echo admin_url('admin-ajax.php'); ?>';

            jQuery.post(url, params, function (response) {
                var result = JSON.parse(response);

                var stats_match_home = result['match_home'];
                var stats_match_away = result['match_away'];

                var size_home = Object.keys(stats_match_home).length;
                var size_away = Object.keys(stats_match_away).length;

                if (size_home == 0 || size_away == 0) {
                    var noDataModal = new bootstrap.Modal(document.getElementById('noDataModal'));
                    noDataModal.show();

                    $('.btnClose').click(function() {
                        noDataModal.hide();
                    });
                } else {
                    load_stats_teams(stats_match_home[0], stats_match_away[0]);

                    load_stats_player(result['players_away'], 'away');
                    load_stats_player(result['players_home'], 'home');

                    var matchModal = new bootstrap.Modal(document.getElementById('matchModal'));

                    document.getElementById('first_tab').click();
                    matchModal.show();

                    $('.btnClose').click(function() {
                        matchModal.hide();
                    });
                }
            });
        });

        function focus_week() {
            var params = {
                'action': 'get_current_week'
            };

            var url = '<?php echo admin_url('admin-ajax.php'); ?>';

            jQuery.post(url, params, function (response) {
                var result = JSON.parse(response);

                var position = result - 4;
                if (position < 0) {
                    //No hacemos nada, es para evitar la excepcion (no existe el row al realizar la resta)
                } else {
                    var container = $(".scrollable")[0];
                    var row = $("#table_schedule tbody tr")[position];

                    container.scrollTop = row.offsetTop;
                }
            });
        }

        function load_stats_teams(stats_home, stats_away) {
            $.each(stats_home, function(key, value) {

                if (key == 'icon') {
                    $('#icon_home').attr("src", `<?php bloginfo('template_url');?>/images/icon-teams/${value}`);
                } else {
                    if (key == 'RED ZONE EFF.') {
                        value = value.slice(0,3);
                    }

                    var key_aux = key.replace(/\s+/g, '-');
                    var key_aux2 = key_aux.replace(/\./g, '');

                    var id_value = '.' + key_aux2 + '_home';

                    $(id_value).text(value);
                }
            });

            $.each(stats_away, function(key, value) {
                if (key == 'icon') {
                    $('#icon_away').attr("src", `<?php bloginfo('template_url');?>/images/icon-teams/${value}`);
                } else {
                    if (key == 'RED ZONE EFF.') {
                        value = value.slice(0,3);
                    }

                    var key_aux = key.replace(/\s+/g, '-');
                    var key_aux2 = key_aux.replace(/\./g, '');

                    var id = '.' + key_aux2 + "_away";
                    $(id).text(value);
                }
            });
        }

        function load_stats_player(stats, type) {

            // Stats de pase

            var type_stats = stats['Passing'];
            var table;

            if (type == 'away') {
                table = document.getElementById('passTable_away');
                $('#passTable_away tr').remove();
            } else {
                table = document.getElementById('passTable_home');
                $('#passTable_home tr').remove();
            }

            var header = table.createTHead();
            var row_header = header.insertRow(0);

            var cell = row_header.insertCell(-1);
            cell.innerHTML = 'JUGADOR';
            cell.style.textAlign = "center";
            cell.style.fontWeight = "bold";

            cell = row_header.insertCell(-1);
            cell.innerHTML = 'ATT/COMP';
            cell.style.textAlign = "center";
            cell.style.fontWeight = "bold";

            cell = row_header.insertCell(-1);
            cell.innerHTML = 'YDS';
            cell.style.textAlign = "center";
            cell.style.fontWeight = "bold";

            cell = row_header.insertCell(-1);
            cell.innerHTML = 'TD';
            cell.style.textAlign = "center";
            cell.style.fontWeight = "bold";

            cell = row_header.insertCell(-1);
            cell.innerHTML = 'INT';
            cell.style.textAlign = "center";
            cell.style.fontWeight = "bold";

            $.each(type_stats, function(key, value) {
                var row = table.insertRow(-1);
                var player = row.insertCell(0);
                var attcomp = row.insertCell(1);
                var yds = row.insertCell(2);
                var td = row.insertCell(3);
                var int = row.insertCell(4);

                player.innerHTML = value['Player'];
                player.style.textAlign = "center";
                player.className = 'font-text-stats-match';

                attcomp.innerHTML = value['CP/ATT'];
                attcomp.style.textAlign = "center";
                attcomp.className = 'font-text-stats-match';

                yds.innerHTML = value['YDS'];
                yds.style.textAlign = "center";
                yds.className = 'font-text-stats-match';

                td.innerHTML = value['TD'];
                td.style.textAlign = "center";
                td.className = 'font-text-stats-match';

                int.innerHTML = value['INT'];
                int.style.textAlign = "center";
                int.className = 'font-text-stats-match';
            });

            // Stats de carrera

            type_stats = stats['Rushing'];

            if (type == 'away') {
                table = document.getElementById('rushTable_away');
                $('#rushTable_away tr').remove();
            } else {
                table = document.getElementById('rushTable_home');
                $('#rushTable_home tr').remove();
            }

            header = table.createTHead();
            row_header = header.insertRow(0);

            cell = row_header.insertCell(-1);
            cell.innerHTML = 'JUGADOR';
            cell.style.textAlign = "center";
            cell.style.fontWeight = "bold";

            cell = row_header.insertCell(-1);
            cell.innerHTML = 'ATT';
            cell.style.textAlign = "center";
            cell.style.fontWeight = "bold";

            cell = row_header.insertCell(-1);
            cell.innerHTML = 'YDS';
            cell.style.textAlign = "center";
            cell.style.fontWeight = "bold";

            cell = row_header.insertCell(-1);
            cell.innerHTML = 'TD';
            cell.style.textAlign = "center";
            cell.style.fontWeight = "bold";

            cell = row_header.insertCell(-1);
            cell.innerHTML = 'LG';
            cell.style.textAlign = "center";
            cell.style.fontWeight = "bold";

            $.each(type_stats, function(key, value) {
                var row = table.insertRow(-1);
                var player = row.insertCell(0);
                var att = row.insertCell(1);
                var yds = row.insertCell(2);
                var td = row.insertCell(3);
                var lg = row.insertCell(4);

                player.innerHTML = value['Player'];
                player.style.textAlign = "center";
                player.className = 'font-text-stats-match';

                att.innerHTML = value['ATT'];
                att.style.textAlign = "center";
                att.className = 'font-text-stats-match';

                yds.innerHTML = value['YDS'];
                yds.style.textAlign = "center";
                yds.className = 'font-text-stats-match';

                td.innerHTML = value['TD'];
                td.style.textAlign = "center";
                td.className = 'font-text-stats-match';

                lg.innerHTML = value['LG'];
                lg.style.textAlign = "center";
                lg.className = 'font-text-stats-match';
            });

            // Stats de recepcion

            type_stats = stats['Receiving'];

            if (type == 'away') {
                table = document.getElementById('receivingTable_away');
                $('#receivingTable_away tr').remove();
            } else {
                table = document.getElementById('receivingTable_home');
                $('#receivingTable_home tr').remove();
            }

            header = table.createTHead();
            row_header = header.insertRow(0);

            cell = row_header.insertCell(-1);
            cell.innerHTML = 'JUGADOR';
            cell.style.textAlign = "center";
            cell.style.fontWeight = "bold";

            cell = row_header.insertCell(-1);
            cell.innerHTML = 'TAR';
            cell.style.textAlign = "center";
            cell.style.fontWeight = "bold";

            cell = row_header.insertCell(-1);
            cell.innerHTML = 'REC';
            cell.style.textAlign = "center";
            cell.style.fontWeight = "bold";

            cell = row_header.insertCell(-1);
            cell.innerHTML = 'YDS';
            cell.style.textAlign = "center";
            cell.style.fontWeight = "bold";

            cell = row_header.insertCell(-1);
            cell.innerHTML = 'TD';
            cell.style.textAlign = "center";
            cell.style.fontWeight = "bold";

            cell = row_header.insertCell(-1);
            cell.innerHTML = 'LG';
            cell.style.textAlign = "center";
            cell.style.fontWeight = "bold";

            $.each(type_stats, function(key, value) {
                var row = table.insertRow(-1);
                var player = row.insertCell(0);
                var tar = row.insertCell(1);
                var rec = row.insertCell(2);
                var yds = row.insertCell(3);
                var td = row.insertCell(4);
                var lg = row.insertCell(5);

                player.innerHTML = value['Player'];
                player.style.textAlign = "center";
                player.className = 'font-text-stats-match';

                tar.innerHTML = value['TAR'];
                tar.style.textAlign = "center";
                player.className = 'font-text-stats-match';

                rec.innerHTML = value['REC'];
                rec.style.textAlign = "center";
                player.className = 'font-text-stats-match';

                yds.innerHTML = value['YDS'];
                yds.style.textAlign = "center";
                player.className = 'font-text-stats-match';

                td.innerHTML = value['TD'];
                td.style.textAlign = "center";
                player.className = 'font-text-stats-match';

                lg.innerHTML = value['LG'];
                lg.style.textAlign = "center";
                player.className = 'font-text-stats-match';
            });

           // Stats de defensa

            type_stats = stats['Defense'];

            if (type == 'away') {
                table = document.getElementById('defenseTable_away');
                $('#defenseTable_away tr').remove();
            } else {
                table = document.getElementById('defenseTable_home');
                $('#defenseTable_home tr').remove();
            }

            header = table.createTHead();
            row_header = header.insertRow(0);

            cell = row_header.insertCell(-1);
            cell.innerHTML = 'JUGADOR';
            cell.style.textAlign = "center";
            cell.style.fontWeight = "bold";

            cell = row_header.insertCell(-1);
            cell.innerHTML = 'T-A';
            cell.style.textAlign = "center";
            cell.style.fontWeight = "bold";

            cell = row_header.insertCell(-1);
            cell.innerHTML = 'SACK';
            cell.style.textAlign = "center";
            cell.style.fontWeight = "bold";

            cell = row_header.insertCell(-1);
            cell.innerHTML = 'INT';
            cell.style.textAlign = "center";
            cell.style.fontWeight = "bold";

            $.each(type_stats, function(key, value) {
                var row = table.insertRow(-1);
                var player = row.insertCell(0);
                var t_a = row.insertCell(1);
                var sack = row.insertCell(2);
                var int = row.insertCell(3);

                player.innerHTML = value['Player'];
                player.style.textAlign = "center";
                player.className = 'font-text-stats-match';

                t_a.innerHTML = value['T-A'];
                t_a.style.textAlign = "center";
                t_a.className = 'font-text-stats-match';

                sack.innerHTML = value['SACK'];
                sack.style.textAlign = "center";
                sack.className = 'font-text-stats-match';

                int.innerHTML = value['INT'];
                int.style.textAlign = "center";
                int.className = 'font-text-stats-match';
            });
        }

    });
</script>