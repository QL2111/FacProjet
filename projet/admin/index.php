<?php
require ('Database.php');
require ('Spectacle.php');
require ('SpectacleManager.php');

//TODO RENVOYER AU FORMULAIRE SI C'EST EMPTY
//print_r($_POST["titre"]);
if (isset($_POST["titre"]) && isset($_POST["date"]) && isset($_POST["heure"]) && isset($_POST["lieu"]) && isset($_POST["image"]) && isset($_POST["prix"]) && isset($_POST["musique"])){

    $Spectacle = new Spectacle(
            array(
                    "titre"=>htmlspecialchars($_POST["titre"]),
                "date"=>htmlspecialchars($_POST["date"]),
                "heure"=>htmlspecialchars($_POST["heure"]),
                "lieu"=>htmlspecialchars($_POST["lieu"]),
                "image"=>htmlspecialchars($_POST["image"]),
                "prix"=>htmlspecialchars($_POST["prix"]),
                "musique"=>htmlspecialchars($_POST["musique"])
            )
    );


    $db=new DataBase();
    $connexion=$db->getConnexion();

    $SM = new SpectacleManager($db);
    $SM->add($Spectacle);


}

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Page Admin</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

<section>
    <form method="post" action="index.php">
        <label>Insertion d'un spectacle</label>
        <p><label>Titre : </label><input type="text" name="titre" value="TCHAIKOVSKI BEETHOVEN OFFENBACH VIOLONCELLE ET PIANO"></p>
        <p><label>date : </label><input type="text" name="date" value="20/11/2021"></p>
        <p><label>heure : </label><input type="text" name="heure" value="17:30"></p>
        <p><label>Lieu : </label><input type="text" name="lieu" value="Eglise Saint-emphrem Paris"></p>
        <p><label>Image : </label><input type="file" name="image" accept="image/png"></p>
        <p><label>Prix : </label><input type="text" name="prix" value="17"></p>
        <p><label>Musique : </label><input type="text" name="musique" value="10"></p>


        <input type="submit" value="Ajouter">

    </form>
</section>

</body>
</html>