<?php
session_start();
include('connexion.php');

if(isset($_SESSION['prix_spectacle']) && isset($_POST['place'])){
    $prix = $_SESSION['prix_spectacle'];
    $nbPlaces = $_POST['place'];

    $prixFinal = $prix*$nbPlaces;
    $_SESSION['prixFinal'] = $prixFinal;
}
//Redirection vers login si l'utilisateur n'est pas connecter (session vide)
if (!isset($_SESSION['id']) || !isset($_SESSION['mail']) || !isset($_SESSION['nom']) || !isset($_SESSION['prenom'])){

    header("location:login.php");

}else{
    $mail = $_SESSION['mail'];
    $nom = $_SESSION["nom"];
    $prenom = $_SESSION["prenom"];
    $idClient = $_SESSION['id'];
}

//Si confirmation de commande insertion dans la base de données
if (isset($_POST['confirmer']) && isset($_SESSION['date'])){
    $prixFinal = $_SESSION['prixFinal'];
    $date = $_SESSION['date'];


    //Vérification si la commande n'existe pas déjà
    $requeteExistence = "SELECT * FROM Commande WHERE id_client='$idClient' AND prix_total ='$prixFinal' AND date = '$date'";
    $ExisteDeja = $connexion->query($requeteExistence);

    if ($ExisteDeja->rowcount()==0){
        $requeteInsertion = "INSERT INTO Commande (id_client, prix_total, date ) VALUES ('$idClient', '$prixFinal', '$date')";
        $executionInsertion = $connexion->exec($requeteInsertion);
    }

}
?>

<html>
<head>
    <meta charset="utf-8" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <title>SitePanier</title>

</head>
<body>
<!-- DEBUT de la page insertion du header via require("header.php")-->
<?php require("header.php"); ?>


<section>
    <header>
        <h2>Mon panier</h2>
    </header>
    <figure>
        <img src="images/poubelle.png" alt="Image du spectacle en question">
        <figcaption></figcaption>
    </figure>
    <strong>Merci pour votre achat <?=$nom." ".$prenom?> voulez vous valider votre panier pour <?=$prixFinal?> € ?</strong>
    <form action="panier.php" method="post">

        <input type="submit" name="confirmer" value="Confirmer">
    </form>

</section>


<!--FOOTER INSERTION AVEC REQUIRE("footer.php")-->
<?php require("footer.php"); ?>


</body>
</html>