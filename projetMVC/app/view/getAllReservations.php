<?php
//print_r($content);
?>

<ul>
    <?php foreach($content as $reservations):?>
        <li><?=$reservations->Titre?> le <?=$reservations->date?> à <?=$reservations->heure?> , <?=$reservations->Lieu?> </li>
    <?php endforeach;?>
</ul>
