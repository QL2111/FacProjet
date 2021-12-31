<?php
namespace app\model;

use \app\entity\Client;
use app\config\Database;
use \PDO;

class ClientModel extends Model{

    private \PDO $connexion;

    public function __construct()
    {
        $this->table="client";
        parent::__construct($this->table);

        $db = new Database();


        $this->connexion=$db->getConnection();
    }


    public function findAll()   {

        $listeClient = $this->find();

        return $listeClient;

    }

    public function addClient($mail, $mdp, $nom,$prenom ) :bool
    {
        $requete1 = "SELECT * FROM " . $this->table." WHERE email = '$mail'";

        $ExisteDeja = $this->connexion->query($requete1);

        $data = $ExisteDeja->fetchAll(PDO::FETCH_OBJ);

        //On vérifie que l'utilisateur n'a pas déjà enregistrer son adresse mail
        if($ExisteDeja->rowcount()==0){
            $requeteInsertion ="INSERT INTO client(email, mot_de_passe, nom, prenom) VALUES ('$mail', '$mdp', '$nom', '$prenom')";
            $resultatInsertion = $this->connexion->exec($requeteInsertion);
            return true;
        }else{
            //échec de l'insertion
            return false;
        }

    }

    //ici on veut récupérer le mail et le mots de passe pour le login(vérification dans la base de données)
    public function getMail($mail)
    {
        $requeteMail = "SELECT email FROM client WHERE email='$mail'";
        $resultatMail = $this->connexion->query($requeteMail);
        $afficherMail = $resultatMail->fetch(PDO::FETCH_OBJ);

        return $afficherMail;


    }
    //On prend le mot de passe,id,nom et prénom correspondant à l'email

    public function getMdp($mail)
    {
        $requeteMdp = "SELECT mot_de_passe FROM client WHERE email ='$mail'";
        $resultatMdp = $this->connexion->query($requeteMdp);
        $afficherMdp = $resultatMdp->fetch(PDO::FETCH_OBJ);

        return $afficherMdp;

    }

    public function getId($mail)
    {
        $requeteId = "SELECT id_client FROM client WHERE email ='$mail'";
        $resultatId = $this->connexion->query($requeteId);
        $afficherId = $resultatId->fetch(PDO::FETCH_OBJ);

        return $afficherId;
    }

    public function getNom($mail)
    {
        $requeteNom = "SELECT nom FROM client WHERE email ='$mail'";
        $resultatNom = $this->connexion->query($requeteNom);
        $afficherNom = $resultatNom->fetch(PDO::FETCH_OBJ);

        return $afficherNom;
    }

    public function getPrenom($mail)
    {
        $requetePrenom = "SELECT prenom FROM client WHERE email ='$mail'";
        $resultatPrenom = $this->connexion->query($requetePrenom);
        $afficherPrenom = $resultatPrenom->fetch(PDO::FETCH_OBJ);

        return $afficherPrenom;
    }


}

?>

