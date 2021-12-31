<?php

?>
<section>
    <header>
        <h2><?=$article->Titre?></h2>

    </header>

    <article id="detail-produit">
        <img class="image" src="/<?=$article->img_Lieu?>">
        <p>Le spectacle aura lieu le <?=$article->date." à ".$article->heure.", il prendra place au : ".$article->Lieu?> </p>
        <p>Une place coûte <?=$article->prix?>€</p>

        <form id="form-produit" method="POST" action="index.php?panier">
            <label for="quantite">Quantité</label>
            <select name="place" id="quantite" >
                <option value="1">1 place</option>
                <option value="2">2 places</option>
                <option value="3">3 places</option>
                <option value="4">4 places</option>
                <option value="5">5 places</option>
            </select>
            <input type="submit" value="Ajouter au panier">
        </form>
    </article>
</section>