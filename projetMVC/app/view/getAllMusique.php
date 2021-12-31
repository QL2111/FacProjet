<?php

?>
<ul>
        <?php foreach($content as $musique):?>
            <li class="main-liste">
                Extrait de : <?=$musique->designation?>
            </li>
            <audio class="main-audio" controls>
                <source src="<?=$musique->audio?>" type="audio/mpeg">
            </audio>

        <?php endforeach;?>
</ul>