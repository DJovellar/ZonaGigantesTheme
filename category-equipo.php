
<?php wp_head() ?>
<?php get_header() ?>

<?php
    global $wpdb;
    $stats_passing = $wpdb->get_results("SELECT * FROM stats_passing ORDER BY cast(YDS as signed) DESC");
    $stats_rushing = $wpdb->get_results("SELECT * FROM stats_rushing ORDER BY cast(YDS as signed) DESC");
    $stats_receiving = $wpdb->get_results("SELECT * FROM stats_receiving ORDER BY cast(YDS as signed) DESC");
    $stats_defense = $wpdb->get_results("SELECT
                                            IF (t.Photo is not null, t.Photo, i.Photo) AS 'Photo',
                                            IF (t.Player is not null, t.Player, i.Player) AS 'Player',
                                            IF (t.TOTAL is not null, t.TOTAL, 0) AS 'TOTAL',
                                            IF (t.SCK is not null, t.SCK, 0) AS 'SCK',
                                            IF (t.F is not null, t.F, 0) AS 'F',
                                            IF (i.INT is not null, i.INT, 0) AS 'INT',
                                            IF (i.TDS is not null, i.TDS, 0) AS 'TDS'
                                            FROM stats_defense_tackles t
                                            LEFT JOIN stats_defense_ints i ON t.Photo = i.Photo ORDER BY cast(t.TOTAL as signed) DESC");

?>
<div class="container pt-5">
    <div class="row no-gutters">
        <div class="col-6 d-flex justify-content-center">
            <div class="card" style="border: none;">
                <div class="border-0 card-img-top">
                    <img src="<?php bloginfo('template_url');?>/images/staff/Dave-Gettleman.png"
                            onerror="this.src='<?php bloginfo('template_url');?>/images/no-image.png'"
                            class="img-fluid" width="210" height="210">
                </div>
                <div class="card-body">
                    <h5 class="card-title d-flex justify-content-center text-center">Dave Gettleman</h5>
                    <p class="card-text d-flex justify-content-center text-center">General Manager</p>
                </div>
            </div>
        </div>
        <div class="col-6 d-flex justify-content-center">
            <div class="card" style="border: none;">
                <div class="border-0 card-img-top">
                    <img src="<?php bloginfo('template_url');?>/images/staff/Joe-Judge.png"
                            onerror="this.src='<?php bloginfo('template_url');?>/images/no-image.png'"
                            class="img-fluid" width="230" height="230">
                </div>
                <div class="card-body">
                    <h5 class="card-title d-flex justify-content-center text-center">Joe Judge</h5>
                    <p class="card-text d-flex justify-content-center text-center">Head Coach</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row pt-4 no-gutters">
        <div class="col-4 d-flex justify-content-center">
            <div class="card" style="border: none;">
                <div class="border-0 card-img-top">
                    <img src="<?php bloginfo('template_url');?>/images/staff/Jason-Garret.png"
                            onerror="this.src='<?php bloginfo('template_url');?>/images/no-image.png'"
                            class="img-fluid" width="210" height="210">
                </div>
                <div class="card-body">
                    <h5 class="card-title d-flex justify-content-center text-center">Jason Garret</h5>
                    <p class="card-text d-flex justify-content-center text-center">Coordinador Ofensivo</p>
                </div>
            </div>
        </div>
        <div class="col-4 d-flex justify-content-center">
            <div class="card" style="border: none;">
                <div class="border-0 card-img-top">
                    <img src="<?php bloginfo('template_url');?>/images/staff/Patrick-Graham.png"
                            onerror="this.src='<?php bloginfo('template_url');?>/images/no-image.png'"
                            class="img-fluid" width="210" height="210">
                </div>
                <div class="card-body">
                    <h5 class="card-title d-flex justify-content-center text-center">Patrick Graham</h5>
                    <p class="card-text d-flex justify-content-center text-center">Coordinador Defensivo</p>
                </div>
            </div>
        </div>
        <div class="col-4 d-flex justify-content-center">
            <div class="card" style="border: none;">
                <div class="border-0 card-img-top">
                    <img src="<?php bloginfo('template_url');?>/images/staff/Thomas-McGaughey.png"
                            onerror="this.src='<?php bloginfo('template_url');?>/images/no-image.png'"
                            class="img-fluid" width="210" height="210">
                </div>
                <div class="card-body">
                    <h5 class="d-flex justify-content-center text-center">Thomas</h5>
                    <h5 class="d-flex justify-content-center text-center" style="margin-top: 0;">McGaughey</h5>
                    <span class="card-text d-flex justify-content-center text-center">Coordinador de </span>
                    <span class="card-text d-flex justify-content-center text-center">Equipos Especiales </span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container pt-4">
    <nav class="nav nav-pills flex-column flex-sm-row">
        <a class="flex-sm-fill text-sm-center nav-link active shadow" aria-controls="home" data-toggle="tab" role="tab" href="#pass">Pase</a>
        <a class="flex-sm-fill text-sm-center nav-link shadow" aria-controls="profile" data-toggle="tab" role="tab" href="#rush">Carrera</a>
        <a class="flex-sm-fill text-sm-center nav-link shadow" aria-controls="profile2" data-toggle="tab" role="tab" href="#reception">Recepcion</a>
        <a class="flex-sm-fill text-sm-center nav-link shadow" aria-controls="profile2" data-toggle="tab" role="tab" href="#defense">Defensa</a>
    </nav>
    <br>
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade show active shadow" id="pass">
            <div class="table-responsive">
                <table class="table table-striped" id="passTable">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center" style="width: 10%"></th>
                            <th scope="col" class="text-center" style="width: 10%">JUGADOR</th>
                            <th scope="col" class="text-center" style="width: 10%">ATT</th>
                            <th scope="col" class="text-center" style="width: 10%">COMP</th>
                            <th scope="col" class="text-center" style="width: 10%">YDS</th>
                            <th scope="col" class="text-center" style="width: 10%">COMP%</th>
                            <th scope="col" class="text-center" style="width: 10%">YDS/ATT</th>
                            <th scope="col" class="text-center" style="width: 10%">TD</th>
                            <th scope="col" class="text-center" style="width: 10%">INT</th>
                            <th scope="col" class="text-center" style="width: 10%">SACKS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($stats_passing as $stats_player) { ?>
                                <tr>
                                    <td class="text-center align-middle" style="width: 10%; padding: 6px">
                                        <img src="<?php bloginfo('template_url');?>/images/players/<?php echo $stats_player->Photo ?>"
                                             onerror="this.src='<?php bloginfo('template_url');?>/images/no-image.png'"
                                             class="img-fluid" width="80" height="80">
                                    </td>
                                    <td class="text-center align-middle font-weight-bold" style="width: 15%"><?php echo $stats_player->Player ?></td>
                                    <td class="text-center align-middle" style="width: 10%"><?php echo $stats_player->ATT ?></td>
                                    <td class="text-center align-middle" style="width: 10%"><?php echo $stats_player->COMP ?></td>
                                    <td class="text-center align-middle" style="width: 10%"><?php echo $stats_player->YDS ?></td>
                                    <td class="text-center align-middle" style="width: 10%"><?php echo $stats_player->{'COMP%'} ?></td>
                                    <td class="text-center align-middle" style="width: 10%"><?php echo $stats_player->{'YDS/ATT'} ?></td>
                                    <td class="text-center align-middle" style="width: 10%"><?php echo $stats_player->TD ?></td>
                                    <td class="text-center align-middle" style="width: 10%"><?php echo $stats_player->INT ?></td>
                                    <td class="text-center align-middle" style="width: 10%"><?php echo $stats_player->SCK ?></td>
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div role="tabpanel" class="tab-pane fade shadow" id="rush">
            <div class="table-responsive">
                <table class="table table-striped" id="rushTable">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center" style="width: 10%"></th>
                            <th scope="col" class="text-center" style="width: 15%">JUGADOR</th>
                            <th scope="col" class="text-center" style="width: 15%">ATT</th>
                            <th scope="col" class="text-center" style="width: 15%">YDS</th>
                            <th scope="col" class="text-center" style="width: 15%">YDS/ATT</th>
                            <th scope="col" class="text-center" style="width: 15%">LONG</th>
                            <th scope="col" class="text-center" style="width: 15%">TD</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($stats_rushing as $stats_player) { ?>
                                <tr>
                                    <td class="text-center align-middle" style="width: 10%; padding: 6px">
                                        <img src="<?php bloginfo('template_url');?>/images/players/<?php echo $stats_player->Photo ?>"
                                             onerror="this.src='<?php bloginfo('template_url');?>/images/no-image.png'"
                                             class="img-fluid" width="80" height="80">
                                    </td>
                                    <td class="text-center align-middle font-weight-bold" style="width: 15%"><?php echo $stats_player->Player ?></td>
                                    <td class="text-center align-middle " style="width: 15%"><?php echo $stats_player->ATT ?></td>
                                    <td class="text-center align-middle " style="width: 15%"><?php echo $stats_player->YDS ?></td>
                                    <td class="text-center align-middle " style="width: 15%"><?php echo $stats_player->{'YDS/ATT'} ?></td>
                                    <td class="text-center align-middle " style="width: 15%"><?php echo $stats_player->LNG ?></td>
                                    <td class="text-center align-middle " style="width: 15%"><?php echo $stats_player->TD ?></td>
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane fade shadow" id="reception">
            <div class="table-responsive">
                <table class="table table-striped" id="receivingTable">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center align-middle" style="width: 10%"></th>
                            <th scope="col" class="text-center align-middle" style="width: 15%">JUGADOR</th>
                            <th scope="col" class="text-center" style="width: 15%">REC</th>
                            <th scope="col" class="text-center" style="width: 15%">YDS</th>
                            <th scope="col" class="text-center" style="width: 15%">YDS/REC</th>
                            <th scope="col" class="text-center" style="width: 15%">LONG</th>
                            <th scope="col" class="text-center" style="width: 15%">TD</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($stats_receiving as $stats_player) { ?>
                                <tr>
                                    <td class="text-center align-middle" style="width: 10%; padding: 6px">
                                        <img src="<?php bloginfo('template_url');?>/images/players/<?php echo $stats_player->Photo ?>"
                                             onerror="this.src='<?php bloginfo('template_url');?>/images/no-image.png'"
                                             class="img-fluid" width="80" height="80">
                                    </td>
                                    <td class="text-center align-middle font-weight-bold" style="width: 15%"><?php echo $stats_player->Player ?></td>
                                    <td class="text-center align-middle" style="width: 15%"><?php echo $stats_player->REC ?></td>
                                    <td class="text-center align-middle" style="width: 15%"><?php echo $stats_player->YDS ?></td>
                                    <td class="text-center align-middle" style="width: 15%"><?php echo $stats_player->{'YDS/REC'} ?></td>
                                    <td class="text-center align-middle" style="width: 15%"><?php echo $stats_player->LNG ?></td>
                                    <td class="text-center align-middle" style="width: 15%"><?php echo $stats_player->TD ?></td>
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane fade shadow" id="defense">
            <div class="table-responsive">
                <table class="table table-striped " id="defenseTable">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center align-middle" style="width: 10%"></th>
                            <th scope="col" class="text-center align-middle" style="width: 15%">JUGADOR</th>
                            <th scope="col" class="text-center" style="width: 15%">TACKLES</th>
                            <th scope="col" class="text-center" style="width: 15%">SACKS</th>
                            <th scope="col" class="text-center" style="width: 15%">F.FUMBLES</th>
                            <th scope="col" class="text-center" style="width: 15%">INT</th>
                            <th scope="col" class="text-center" style="width: 15%">TD</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($stats_defense as $stats_player) { ?>
                                <tr>
                                    <td class="text-center align-middle" style="width: 10%; padding: 6px">
                                        <img src="<?php bloginfo('template_url');?>/images/players/<?php echo $stats_player->Photo ?>"
                                             onerror="this.src='<?php bloginfo('template_url');?>/images/no-image.png'"
                                             class="img-fluid" width="80" height="80">
                                    </td>
                                    <td class="text-center align-middle font-weight-bold" style="width: 15%"><?php echo $stats_player->Player ?></td>
                                    <td class="text-center align-middle" style="width: 15%"><?php echo $stats_player->TOTAL ?></td>
                                    <td class="text-center align-middle" style="width: 15%"><?php echo $stats_player->SCK ?></td>
                                    <td class="text-center align-middle" style="width: 15%"><?php echo $stats_player->F ?></td>
                                    <td class="text-center align-middle" style="width: 15%"><?php echo $stats_player->INT ?></td>
                                    <td class="text-center align-middle" style="width: 15%"><?php echo $stats_player->TDS ?></td>
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<?php get_footer()?>

<script>
    $(document).ready( function () {
        $('#passTable').DataTable({
            paging: false,
            info: false,
            searching: false
        });
        $('#rushTable').DataTable({
            paging: false,
            info: false,
            searching: false
        });
        $('#receivingTable').DataTable({
            paging: false,
            info: false,
            searching: false
        });
        $('#defenseTable').DataTable({
            paging: false,
            info: false,
            searching: false
        });
    } );
</script>