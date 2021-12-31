<?php

?>

<h3>Spectacle disponible :</h3>
    <ul> <?php foreach ($content as $spectacle) :?>

            <li>
                <?=$spectacle->Titre?>
                <a href="index.php?article=<?=$spectacle -> id_spectacle  ?>">Cliquer ici pour réserver !</a>
            </li>

        <?php endforeach;?>
    </ul>