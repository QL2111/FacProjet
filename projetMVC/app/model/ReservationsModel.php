<?php
namespace app\model;

use \app\entity\Reservations;
use app\config\Database;
use \PDO;

class  ReservationsModel extends Model{
    private \PDO $connexion;

    public function __construct()
    {
        $this->table="reservations";
        parent::__construct($this->table);

        $db = new Database();


        $this->connexion=$db->getConnection();
    }


    public function findAll()
    {

        $listeClient = $this->find();

        return $listeClient;

    }


    public function addReversation($idClient, $prixFinal, $date, $id_spectacle)
    {
        //Vérification si la commande n'existe pas déjà
        $requeteExistence = "SELECT * FROM reservations WHERE id_client='$idClient' AND prix_total ='$prixFinal' AND date = '$date'";
        $ExisteDeja = $this->connexion->query($requeteExistence);

        if ($ExisteDeja->rowcount()==0)
        {
            $requeteInsertion = "INSERT INTO reservations (id_client, prix_total, date , id_spectacle) VALUES ('$idClient', '$prixFinal', '$date', '$id_spectacle')";
            $executionInsertion = $this->connexion->exec($requeteInsertion);
        }
    }

    public function findSpectacles($id_client){
        $requeteSpectacles = "SELECT SP.Titre, SP.date, SP.heure, SP.Lieu FROM reservations R JOIN spectacle SP ON R.id_spectacle = SP.id_spectacle WHERE R.id_client = '$id_client'";
        $retsultatSpectacles = $this->connexion->query($requeteSpectacles);
        $afficherSpectacles = $retsultatSpectacles->fetchAll(PDO::FETCH_OBJ);
        return $afficherSpectacles;

    }

}

?>