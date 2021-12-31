<?php

?>
<section>
    <form class="box" method="post" action="index.php">
        <h2>Insertion spectacle</h2>
        <p><label>Titre : </label><input type="text" name="titre" value="TCHAIKOVSKI BEETHOVEN OFFENBACH VIOLONCELLE ET PIANO"></p>
        <p><label>date : </label><input type="text" name="date" value="20/11/2021"></p>
        <p><label>heure : </label><input type="text" name="heure" value="17:30"></p>
        <p><label>Lieu : </label><input type="text" name="lieu" value="Eglise Saint-emphrem Paris"></p>
        <p><label>Image : </label><input type="file" name="image" accept="image/png, image/jpeg"></p>
        <p><label>Prix : </label><input type="text" name="prix" value="17"></p>
        <p><label>Musique : </label><input type="text" name="musique" value="10"></p>


        <input type="submit" value="Ajouter">

    </form>
</section>
