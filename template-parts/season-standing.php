<?php
    //get_standing_NFC_East();
    global $wpdb;
    $standing = $wpdb->get_results("SELECT * FROM `standing` ORDER BY `Percentage` DESC");
?>

<h5 class="text-center">NFC East</h5>
<hr>
<table class="table table-borderless">
    <thead class="thead-dark font-title text-center">
    <tr>
        <th scope="col" style="background-color: #00035F;">Equipo</th>
        <th scope="col" class="text-center" style="background-color: #00035F;">W</th>
        <th scope="col" class="text-center" style="background-color: #00035F;">L</th>
        <th scope="col" class="text-center" style="background-color: #00035F;">Tie</th>
        <th scope="col" class="text-center" style="background-color: #00035F;">%</th>
    </tr>
    </thead>
    <tbody class="font-text font-size-min">
    <tr>
        <td>
        <img src="<?php bloginfo('template_url');?>/images/icon-teams/<?php echo $standing[0]->Division ?>" class="img-fluid table-row-custom" alt="" width="22" height="22">
        <span class="pl-2"><?php echo $standing[0]->Name ?></span>
        </td>
        <td class="text-center"><?php echo $standing[0]->Win ?></td>
        <td class="text-center"><?php echo $standing[0]->Losses ?></td>
        <td class="text-center"><?php echo $standing[0]->Ties ?></td>
        <td class="text-center"><?php echo $standing[0]->Percentage ?></td>
    </tr>
    <tr>
        <td>
        <img src="<?php bloginfo('template_url');?>/images/icon-teams/<?php echo $standing[1]->Division ?>" class="img-fluid table-row-custom" alt="" width="22" height="22">
        <span class="pl-2"><?php echo $standing[1]->Name ?></span>
        </td>
        <td class="text-center"><?php echo $standing[1]->Win ?></td>
        <td class="text-center"><?php echo $standing[1]->Losses ?></td>
        <td class="text-center"><?php echo $standing[1]->Ties ?></td>
        <td class="text-center"><?php echo $standing[1]->Percentage ?></td>
    </tr>
    <tr>
        <td>
        <img src="<?php bloginfo('template_url');?>/images/icon-teams/<?php echo $standing[2]->Division ?>" class="img-fluid table-row-custom" alt="" width="22" height="22">
        <span class="pl-2"><?php echo $standing[2]->Name ?></span>
        </td>
        <td class="text-center"><?php echo $standing[2]->Win ?></td>
        <td class="text-center"><?php echo $standing[2]->Losses ?></td>
        <td class="text-center"><?php echo $standing[2]->Ties ?></td>
        <td class="text-center"><?php echo $standing[2]->Percentage ?></td>
    </tr>
    <tr>
        <td>
        <img src="<?php bloginfo('template_url');?>/images/icon-teams/<?php echo $standing[3]->Division ?>" class="img-fluid table-row-custom" alt="" width="22" height="22">
        <span class="pl-2"><?php echo $standing[3]->Name ?></span>
        </td>
        <td class="text-center"><?php echo $standing[3]->Win ?></td>
        <td class="text-center"><?php echo $standing[3]->Losses ?></td>
        <td class="text-center"><?php echo $standing[3]->Ties ?></td>
        <td class="text-center"><?php echo $standing[3]->Percentage ?></td>
    </tr>
    </tbody>
</table>