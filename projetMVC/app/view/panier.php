<?php
$imageSpectacle = $_SESSION['img'];

?>

<section>
    <header>
        <h2>Mon panier</h2>
    </header>
    <figure>
        <img class="image" src="<?=$imageSpectacle?>" alt="Image du spectacle en question">
        <figcaption></figcaption>
    </figure>
    <strong>Merci pour votre achat <?=$nom." ".$prenom?> voulez vous valider votre panier pour <?=$prixFinal?> € ?</strong>
    <form action="index.php?reservations" method="post">

        <input type="submit" name="confirmer" value="Confirmer">
    </form>

</section>