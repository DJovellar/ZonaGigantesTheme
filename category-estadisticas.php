
<?php wp_head() ?>
<?php get_header() ?>

<div class="container pt-5">
    <nav class="nav nav-pills flex-column flex-sm-row">
        <a class="flex-sm-fill text-sm-center nav-link active" aria-controls="home" data-toggle="tab" role="tab" href="#general">General</a>
        <a class="flex-sm-fill text-sm-center nav-link" aria-controls="profile" data-toggle="tab" role="tab" href="#pase">Pase</a>
        <a class="flex-sm-fill text-sm-center nav-link" aria-controls="profile" data-toggle="tab" role="tab" href="#carrera">Carrera</a>
        <a class="flex-sm-fill text-sm-center nav-link" aria-controls="profile2" data-toggle="tab" role="tab" href="#recepcion">Recepcion</a>
        <a class="flex-sm-fill text-sm-center nav-link" aria-controls="profile2" data-toggle="tab" role="tab" href="#defensa">Defensa</a>
        <a class="flex-sm-fill text-sm-center nav-link" aria-controls="profile2" data-toggle="tab" role="tab" href="#equiposEspeciales">Equipos especiales</a>
    </nav>
    <hr>
    <br>
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade show active" id="general">
            <?php
                global $wpdb;
                $stats_passing = $wpdb->get_results("SELECT * FROM `stats_passing`");
            ?>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Foto</th>
                            <th scope="col" class="text-center">Nombre</th>
                            <th scope="col" class="text-center">Intentos</th>
                            <th scope="col" class="text-center">Completados</th>
                            <th scope="col" class="text-center">Yardas</th>
                            <th scope="col" class="text-center">Completados %</th>
                            <th scope="col" class="text-center">Yardas/Intento</th>
                            <th scope="col" class="text-center">Touchdows</th>
                            <th scope="col" class="text-center">Intercepciones</th>
                            <th scope="col" class="text-center">Sacks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($stats_passing as $stats_players) { ?>
                                <tr>
                                    <td class="text-center">
                                        <img src="https://static.clubs.nfl.com/image/private/t_thumb_squared/f_auto/giants/v59trxgtfmixz7zt128a" class="img-fluid" width="50" height="50">
                                    </td>
                                    <td class="text-center align-middle">Daniel Jones</td>
                                    <td class="text-center align-middle">448</td>
                                    <td class="text-center align-middle">280</td>
                                    <td class="text-center align-middle">2943</td>
                                    <td class="text-center align-middle">62.5%</td>
                                    <td class="text-center align-middle">6.6</td>
                                    <td class="text-center align-middle">11</td>
                                    <td class="text-center align-middle">10</td>
                                    <td class="text-center align-middle">45</td>
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>



        <div role="tabpanel" class="tab-pane fade" id="pase">
            <h1>PROVA 2</h1>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="carrera">
            <h1>PROVA 3</h1>
        </div>
    </div>

</div>

<?php get_footer()?>