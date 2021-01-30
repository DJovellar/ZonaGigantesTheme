
<?php
    //update_schedule();
    //update_current_week();
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
                    <td class="text-center"><?php echo $match->date ?></td>
                </tr>
        <?php } ?>
    </tbody>
</table>