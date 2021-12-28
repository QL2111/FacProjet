<?php
session_start();
include ("connexion.php");
//Get de l'id de l'article
if ( !empty($_GET['article']) )
{
    $numArticle = $_GET['article'];
    $sql1 = "SELECT * FROM Spectacle WHERE id_spectacle = $numArticle";
    $resultat_produit = $connexion->query($sql1);
    $article = $resultat_produit->fetch(PDO::FETCH_OBJ);

}

$_SESSION['id_spectacle'] = $article->id_spectacle;
$_SESSION['prix_spectacle'] = $article->prix;
$_SESSION['date'] = $article->date;

//Redirection vers le panier une fois la quantité sélectionner


?>

<html>
<head>
    <meta charset="utf-8" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <title>vue_Produit</title>
</head>
<body>
<?php require("header.php") ?>

<section>


    <header>
        <h2><?=$article->Titre?></h2>

    </header>

    <article id="detail-produit">
        <img src="/<?=$article->img_Lieu?>">
        <p>Le spectacle aura lieu le <?=$article->date." à ".$article->heure?></p>
        <p>Une place coûte <?=$article->prix?>€</p>

        <form id="form-produit" method="POST" action="panier.php">
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


<?php require("footer.php"); ?>

</body>

</html>