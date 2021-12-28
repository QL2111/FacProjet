<?php
session_start();
include('connexion.php');

$spectacle = "SELECT * FROM `Spectacle` WHERE 1";
$resultatSpectacle = $connexion->query($spectacle);
$afficherSpectacle = $resultatSpectacle->fetchAll(PDO::FETCH_OBJ);




$musique = "SELECT * FROM `Musique` WHERE 1";
$resultatMusique = $connexion->query($musique);
$afficherMusique = $resultatMusique->fetchAll(PDO::FETCH_OBJ);

//print_r($afficherMusique);

if (isset($_SESSION['id']) && isset($_SESSION['mail']) && isset($_SESSION['nom'])&& isset($_SESSION['prenom'])){
    $mail = $_SESSION['mail'];
    $nom = $_SESSION["nom"];
    $prenom = $_SESSION["prenom"];


}

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Projet</title>

</head>
<body>

<?php require("header.php"); ?>

<!--Message d'accueil avec mail si connexion-->
<?php if(isset($_SESSION['id']) && isset($_SESSION['mail']) && isset($_SESSION['nom'])&& isset($_SESSION['prenom'])) : ?>
    <header>Bienvenue <?=$nom." ".$prenom?> sur notre site web !</header>
<?php endif; ?>
<!-- TO DO  faire une page spécifique à chaque spectacle comme dans le TEA guidé-->
<ul>Spectacle disponible : <?php foreach ($afficherSpectacle as $spectacle) :?>

        <li>
            <?=$spectacle->Titre?>
            <a href="vue_produit.php?article=<?=$spectacle -> id_spectacle  ?>">Plus d'info</a>
        </li>

<?php endforeach;?>
</ul>
<article>
    <h2>Liste des musiques :</h2>
    <ul>
        <?php  foreach ($afficherMusique as $musique) :?>

            <li><?=$musique->designation?></li>
        <?php endforeach; ?>
    </ul>
</article>
<?php require("footer.php"); ?>

</body>
</html>