<?php

session_start();
use \app\controller\ControllerMusique;
use \app\controller\ControllerSpectacle;
use \app\controller\ControllerClient;
use \app\controller\ControllerReservations;
use \app\entity\Spectacle;

//autoload
function chargerClasse($classe)
{
    $classe=str_replace('\\','/',$classe);
    require $classe . '.php';
}

spl_autoload_register('chargerClasse');
//fin Autoload

$controllerClient = new ControllerClient();
$controllerMusique = new ControllerMusique();
$controllerSpectacle = new ControllerSpectacle();
$controllerReservation = new ControllerReservations();


//Traitement du formulaire de créer compte------------------------------

if(isset($_POST["mail"])&& isset($_POST["mdp"])&& isset($_POST["nom"])&& isset($_POST["prenom"]) )
{
    $mail = htmlspecialchars($_POST["mail"]);
    $mdp = htmlspecialchars($_POST["mdp"]);
    $nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);
    addslashes($mail);
    addslashes($mdp);
    addslashes($nom);
    addslashes($prenom);




    $controllerClient->ajouterClient($mail, $mdp, $nom, $prenom);


}else{
    $mail = "";
    $mdp = "";
    $civilite = "";
    $nom = "";
    $prenom = "";
    $code_postal = "";
    $adresse = "";
    $ville = "";
    $pays = "";
    $telephone = "";
}


//Traitement du formulaire login------------------------------------------

if (isset($_POST["mail"])&& isset($_POST["mdp"]))
{

    //Vérif couple mail + mdp identique à celui de la base de données
    $mail = htmlspecialchars($_POST["mail"]);
    $mdp = htmlspecialchars($_POST["mdp"]);
    addslashes($mail);
    addslashes($mdp);

    $mailBDD = $controllerClient->recupMail($mail);
    $mdpBDD = $controllerClient->recupMdp($mail);
    //print_r($mailBDD->email);
    //print_r($mdpBDD->mot_de_passe);

    //On vérifie que ce que l'utilisateur à rentrer dans le formulaire correspond à la BDD
    if ($mail == $mailBDD->email && $mdp == $mdpBDD->mot_de_passe)
    {
        //Si ça marche , stockage des données dans une session de son email, nom, prenom et de son l'idclient

        //id_client
        $clientId = $controllerClient->recupId($mail);

        //nom
        $clientNom = $controllerClient->recupNom($mail);

        //prenom
        $clientPrenom = $controllerClient->recupPrenom($mail);

        $_SESSION['id'] = $clientId->id_client;
        $_SESSION['nom'] = $clientNom->nom;
        $_SESSION['prenom'] = $clientPrenom->prenom;
        $_SESSION['mail']=$mail ;

        //On renvoie à la page index une fois la connexion effectuer

        header("location:index.php");

    }
}
//Session Login
if (isset($_SESSION['id']) && isset($_SESSION['mail']) && isset($_SESSION['nom'])&& isset($_SESSION['prenom']))
{
    $mail = $_SESSION['mail'];
    $nom = $_SESSION["nom"];
    $prenom = $_SESSION["prenom"];
    //On met en majuscule la première lettre
    $nom = ucfirst($nom);
    $prenom = ucfirst($prenom);

}







//Traitement PANIER------------------------------------------------------

if(isset($_SESSION['prix_spectacle']) && isset($_POST['place']))
{
    $prix = $_SESSION['prix_spectacle'];
    $nbPlaces = $_POST['place'];

    $prixFinal = $prix*$nbPlaces;
    //Stockage dans une session pour l'inserer dans la base de donnees dans la partie réservations
    $_SESSION['prixFinal'] = $prixFinal;


}

if (isset($_SESSION['id']) && isset($_SESSION['mail']) && isset($_SESSION['nom']) && isset($_SESSION['prenom']))
{
    $mail = $_SESSION['mail'];
    $nom = $_SESSION["nom"];
    $prenom = $_SESSION["prenom"];
    $idClient = $_SESSION['id'];
    //On met en majuscule la première lettre
    $nom = ucfirst($nom);
    $prenom = ucfirst($prenom);
}
//Si confirmation de commande insertion dans la base de données

//TRAITEMENT RESERVATIONS SUITE AU PANIER-----------------

if (isset($_POST['confirmer']) && isset($_SESSION['date']) && isset($_SESSION['id']) && isset($_SESSION['prixFinal']) && isset($_SESSION['id_spectacle']) )
{
    $idClient = $_SESSION['id'] ;
    $prixFinal = $_SESSION['prixFinal'];

    $date = $_SESSION['date'];
    $id_spectacle = $_SESSION['id_spectacle'];

    $controllerReservation->ajouterReservation($idClient, $prixFinal, $date, $id_spectacle);


}

//ADMIN : AJOUTER UN SPECTACLE
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
    $controllerSpectacle->ajouterSpectacle($Spectacle);
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/reset.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <title>Quentin Lim</title>
</head>

<body>
<!--HEADER DE LA PAGE-->
<header>
        <h1>Projet Web PHP</h1>
        <nav>
            <ul class="nav-list">
                <li class="nav-item"><a href="index.php">accueil</a></li>
                <li class="nav-item"><a href="index.php?login">login</a></li>
                <li class="nav-item"><a href="index.php?creer_compte">créer compte</a></li>
                <li class="nav-item"><a href="index.php?panier">panier</a></li>
                <li class="nav-item"><a href="index.php?reservations">Reservations</a></li>

            </ul>
        </nav>
</header>

<main>

    <!-- AFFICHAGE PAR DEFAUT -->
    <?php if (!isset($_GET['creer_compte']) && !isset($_GET['login']) && !isset($_GET['article']) && !isset($_GET['panier']) && !isset($_GET['reservations']) && !(isset($_GET['admin'])) ) : ?>
        <!--Message d'accueil avec mail si connexion-->
        <?php if(isset($_SESSION['id']) && isset($_SESSION['mail']) && isset($_SESSION['nom'])&& isset($_SESSION['prenom'])) : ?>
            <h3>Bienvenue <?=$nom." ".$prenom?> , la connexion a réussi !</h3>
        <?php endif; ?>
        <?php $controllerSpectacle->getAll(); ?>
        <h3>Liste des musiques : </h3>
        <?php $controllerMusique->getAll(); ?>
    <?php endif;?>
    <!-- FIN AFFICHAGE PAR DEFAUT -->

    <!-- VUE PRODUIT -->
    <?php if (isset($_GET['article']))
    {
        //Get de l'id de l'article
        $numArticle = $_GET['article'];
        $article = $controllerSpectacle->recupArticle($numArticle);

    } ?>
    <!-- FIN VUE PRODUIT -->

    <!-- PANIER -->
    <?php if (isset($_GET['panier']) && isset($_SESSION['prix_spectacle']) && isset($_POST['place']) && isset($_SESSION['id']) )
    {
        //Il faut que l'utilisateur ait sélectionner son spectacle, sa quantité et qu'il soit connecté pour ajouter au panier
        include "app/view/panier.php" ;

    }else if (isset($_GET['panier']) && (!isset($_SESSION['prix_spectacle']) || !isset($_POST['place']) )){
        include "app/view/panierVide.php";
    }else if (isset($_GET['panier']) && !isset($_SESSION['id']))
    {
        include "app/view/pasConnecter.php";
    }?>
    <!-- FIN PANIER -->


    <!-- CREER COMPTE -->
    <?php if (isset($_GET['creer_compte']))
    {
        include "app/view/creer_compte.php" ;
    } ?>
    <!-- FIN CREER COMPTE -->

    <!--LOGIN -->
    <?php if(isset($_GET['login']))
        {
            include "app/view/login.php";
        }

    ?>
    <!--FIN LOGIN -->

    <!--RESERVATIONS-->


    <?php if(isset($_GET['reservations']) && isset($_SESSION['id'])) : //Il faut que l'utilisateur soit connecté pour consulter ses réservations ?>
        <h3>Voici vos réservations pour <?=$nom." ".$prenom?> : </h3>
            <?php $controllerReservation->recupReservations($_SESSION['id']); ?>
        <?php endif;?>
    <?php if (isset($_GET['reservations']) && !isset($_SESSION['id'])) : ?>
        <?php include "app/view/pasConnecter.php"; ?>
    <?php endif ; ?>
    <!--FIN RESERVATIONS-->

    <!--ESPACE ADMIN-->
    <?php if ($mail =='admin@laposte.net') : //L'adresse mail de l'admin est unique, on ne va afficher que si c'est l'admin qui est connecter?>
        <h3><a href="index.php?admin">Espace Admin</a></h3>
        <?php if(isset($_GET['admin'])) : ?>
            <?php include "app/view/adminAddSpectacle.php"?>
        <?php endif; ?>
    <?php endif; ?>
    <!--FIN ESPACE ADMIN-->
</main>


<!-- FOOTER -->
<footer>
    <p>Quentin Lim</p>
    <p><a href="mailto:quentinlim***@gmail.com">Contact</a></p>
</footer>

</body>
</html>
