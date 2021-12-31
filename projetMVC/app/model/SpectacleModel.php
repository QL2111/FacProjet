<?php
namespace app\model;

use \app\entity\Spectacle;
use app\config\Database;
use \PDO;


class SpectacleModel extends Model{
    private \PDO $connexion;


    public function __construct()
    {
        $this->table="spectacle";
        parent::__construct($this->table);
        $db = new Database();

        $this->connexion=$db->getConnection();
    }


    public function findAll()
    {

        $listeSpectacle = $this->find();

        return $listeSpectacle;

    }

    //On va faire ici une function qui va récupérer un article selon son id(numeroArticle) pour vue_produit

    public function getArticle($numArticle)
    {
        $requeteArticle = "SELECT * FROM Spectacle WHERE id_spectacle = $numArticle";
        $resultat_produit = $this->connexion->query($requeteArticle);
        $afficherArticle = $resultat_produit->fetch(PDO::FETCH_OBJ);

        return $afficherArticle;

    }

    public function addSpectacle(Spectacle $s){
        $titre = $s->getTitre();
        $date = $s->getDate();
        $heure = $s->getHeure();
        $lieu = $s->getLieu();
        $prix = $s->getPrix();
        $musique = $s->getMusique();
        $img = $s->getImg();
        $requeteInsertion = "INSERT INTO spectacle (Titre, date, heure, Lieu, img_Lieu, prix, musique) VALUES ('$titre', '$date', '$heure', '$lieu', '../../assets/images/$img', '$prix', '$musique' )";

        $requeteExistence = "SELECT * FROM spectacle WHERE Titre='$titre'";
        $ExisteDeja = $this->connexion->query($requeteExistence);
        if ($ExisteDeja->rowcount()==0){
            $this->connexion->exec($requeteInsertion);
        }
    }



}