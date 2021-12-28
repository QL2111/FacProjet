<?php
include ('connexion.php');
//Traitement du formulaire
if(isset($_POST["mail"])&& isset($_POST["mdp"])&& isset($_POST["civilite"])&& isset($_POST["nom"])&& isset($_POST["prenom"])&& isset($_POST["code_postal"])&& isset($_POST["adresse"])&& isset($_POST["ville"])&& isset($_POST["pays"])&& isset($_POST["telephone"])){
    $mail = htmlspecialchars($_POST["mail"]);
    $mdp = htmlspecialchars($_POST["mdp"]);
    $civilite = htmlspecialchars($_POST["civilite"]);
    $nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);
    $code_postal = htmlspecialchars($_POST["code_postal"]);
    $adresse = htmlspecialchars($_POST["adresse"]);
    $ville = htmlspecialchars($_POST["ville"]);
    $pays = htmlspecialchars($_POST["pays"]);
    $telephone = htmlspecialchars($_POST["telephone"]);
    addslashes($mail);
    addslashes($mdp);
    addslashes($civilite);
    addslashes($nom);
    addslashes($prenom);
    addslashes($code_postal);
    addslashes($adresse);
    addslashes($ville);
    addslashes($pays);
    addslashes($telephone);


    //Vérification si l'utilisateur n'est pas déjà enregistrer

    $requeteExistence = "SELECT * FROM client WHERE email='$mail'";
    $ExisteDeja = $connexion->query($requeteExistence);
    



    if($ExisteDeja->rowcount()==0){
        $requeteInsertion ="INSERT INTO client(email, mot_de_passe, civilite, nom, prenom, adresse, code_postal, ville , pays, telephone)
        VALUES ('$mail', '$mdp', '$civilite', '$nom', '$prenom', '$adresse', '$code_postal', '$ville', '$pays', '$telephone')";
        $resultatInsertion = $connexion->exec($requeteInsertion);

    }


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

?>

<html>
<head>
    <meta charset="utf-8" />
    <link href="css/style.css" rel="stylesheet" />
    <title>Créer Compte</title>

</head>
<body>
<!-- DEBUT de la page insertion du header via require("header.php")-->
<?php require("header.php"); ?>


<section>
    <header>
        <h2>Créer un compte</h2>
    </header>

    <form action="creer_compte.php" method="POST" id="creer-compte">
        <p><label>E-mail : </label> <input type="text" name="mail" value="maximelim@laposte.net"></p>
        <p><label>Mot de Passe : </label> <input type="text" name="mdp" value="mdp"></p>
        <p><label>Civilité : </label> <select name="civilite">
                <option>M</option>
                <option>F</option>
            </select></p>
        <p><label>Nom : </label> <input type="text" name="nom" value="lim"></p>
        <p><label>Prenom : </label> <input type="text" name="prenom" value="maxime"></p>
        <p><label>Code Postal : </label> <input type="text" name="code_postal" value="77230"></p>
        <p><label>Adresse : </label> <input type="text" name="adresse" value="18 Grande Rue"></p>
        <p><label>Ville : </label> <input type="text" name="ville" value="Dammartin"></p>
        <p><label>Pays : </label> <input type="text" name="pays" value="France"></p>
        <p><label>Téléphone : </label> <input type="text" name="telephone" value="0001020304"></p>
        <input type="submit" value="Envoyer">
    </form>

</section>


<!--FOOTER INSERTION AVEC REQUIRE("footer.php")-->

<?php require("footer.php"); ?>

</body>
</html>