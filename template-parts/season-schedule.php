
<?php
    $schedule = get_schedule();
?>

<h5 class="text-center">Proximos partidos</h5>
<hr>
<table class="table table-borderless">
    <thead class="thead-dark font-title text-center">
    <tr>
        <th scope="col" style="background-color: #00035F;">Rival</th>
        <th scope="col" class="text-center" style="background-color: #00035F;">Resultado</th>
        <th scope="col" class="text-center" style="background-color: #00035F;">Fecha</th>
    </tr>
    </thead>
    <tbody class="font-text font-size-min">
        <?php
            foreach($schedule as $match) { ?>
                <tr>
                    <td>
                        <img src="<?php bloginfo('template_url');?>/images/icon-teams/<?php echo $match->icon ?>" class="img-fluid table-row-custom" width="25" height="25">
                        <span class="pl-1"><?php echo $match->rival ?></span>
                    </td>
                    <td class="text-center"><?php echo $match->score ?></td>
                    <td class="text-center">
                        <?php if ($match->score == '*') { ?>
                            <?php echo $match->date ?>
                        <?php } else { ?>
                            <button type="button" class="btn btn-primary btn-sm btnStats">Stats</button>
                        <?php } ?>
                    </td>
                </tr>
        <?php } ?>
    </tbody>
</table>


<div class="modal fade" id="matchModal">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
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
                                <div class="col-4 text-center font-text-stats-match font-title"><h4 class="Team_home"></h4></div>
                                <div class="col-4 text-center font-text-stats-match"></div>
                                <div class="col-4 text-center font-text-stats-match font-title"><h4 class="Team_away"></h4></div>
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
                        <div class="table-responsive">
                            <h5>Giants</h5>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="home">
                        <div class="table-responsive">
                            <h5>Steelers</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-center" style="border-top: 0 none;">
                <button type="button" class="btn btn-primary btnClose">Cerrar</button>
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
                <button type="button" class="btn btn-primary btnClose">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<script>
    jQuery(document).ready(function($) {

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

                console.log(result);

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
                    load_stats_player_away(result[1]);
                    // ANALIZAR COMO RECIBIR LA INFORMACION (TODO EN UNO, SEPARADO POR EQUIPOS, SEPARADO POR POSICIONES DE JUGADORES)---



                    var matchModal = new bootstrap.Modal(document.getElementById('matchModal'));

                    document.getElementById('first_tab').click();
                    matchModal.show();

                    $('.btnClose').click(function() {
                        matchModal.hide();
                    });
                }
            });
        });

        function load_stats_teams(stats_home, stats_away) {
            $.each(stats_home, function(key, value) {
                if (key == 'RED ZONE EFF.') {
                    value = value.slice(0,3);
                }

                var key_aux = key.replace(/\s+/g, '-');
                var key_aux2 = key_aux.replace(/\./g, '');

                var id_value = '.' + key_aux2 + '_home';

                $(id_value).text(value);
            });

            $.each(stats_away, function(key, value) {

                if (key == 'RED ZONE EFF.') {
                    value = value.slice(0,3);
                }

                var key_aux = key.replace(/\s+/g, '-');
                var key_aux2 = key_aux.replace(/\./g, '');

                var id = '.' + key_aux2 + "_away";
                $(id).text(value);
            });
        }

        function load_stats_player_away(stats) {

        }

    });
</script>