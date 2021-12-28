<?php
session_start();
include('connexion.php');

//Vérif formulaire rempli
if (isset($_POST["mail"])&& isset($_POST["mdp"])){

    //Vérif couple mail + mdp identique à celui de la base de données
    $mail = htmlspecialchars($_POST["mail"]);
    $mdp = htmlspecialchars($_POST["mdp"]);
    addslashes($mail);
    addslashes($mdp);

    //Récupération dans la base de données
    $requeteMail = "SELECT email FROM client WHERE email='$mail'";
    $requeteMdp = "SELECT mot_de_passe FROM client WHERE mot_de_passe ='$mdp'";

    $resultatMail = $connexion->query($requeteMail);
    $resultatMdp = $connexion->query($requeteMdp);

    $afficherMail = $resultatMail->fetch(PDO::FETCH_OBJ);
    $afficherMdp = $resultatMdp->fetch(PDO::FETCH_OBJ);


    if ($mail == $afficherMail->email && $mdp == $afficherMdp->mot_de_passe){
        //Si ça marche , stockage des données dans une session de son email, nom, prenom et de son l'idclient

        //id_client
        $requeteId = "SELECT id_client FROM client WHERE email='$mail'";
        $resultatId = $connexion->query($requeteId);
        $clientId = $resultatId->fetch(PDO::FETCH_OBJ);

        //nom
        $requeteNom = "SELECT nom FROM client WHERE email='$mail'";
        $resultatNom = $connexion->query($requeteNom);
        $clientNom = $resultatNom->fetch(PDO::FETCH_OBJ);

        //prenom
        $requetePrenom = "SELECT prenom FROM client WHERE email='$mail'";
        $resultatPrenom = $connexion->query($requetePrenom);
        $clientPrenom = $resultatPrenom->fetch(PDO::FETCH_OBJ);

        $_SESSION['id'] = $clientId->id_client;
        $_SESSION['nom'] = $clientNom->nom;
        $_SESSION['prenom'] = $clientPrenom->prenom;
        $_SESSION['mail']=$mail ;

        //On renvoie à la page index une fois la connexion effectuer

        header("location:index.php");

    }
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>login</title>

</head>
<body>

<?php require("header.php"); ?>

<section>
    <header>
        <h2>Login</h2>
    </header>
    <article>
        <form id="login" method="POST" action="login.php">
            <p><label>E-mail : </label> <input type="text" name="mail" value="maximelim@laposte.net"></p>
            <p><label>Mot de Passe : </label> <input type="text" name="mdp" value="mdp"></p>
            <input type="submit" value="Envoyer">
        </form>
    </article>
</section>
<?php require("footer.php"); ?>
</body>
</html>