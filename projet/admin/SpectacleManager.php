<?php
include_once ('Database.php');
//TO DO AUSSI INSERER UNE IMAGE
class SpectacleManager{
    private object $db;

    //constructeur
    public function __construct($db){
        $this->setDb($db);
    }

    private function setDb(Database $db){
        $this->db = $db->getConnexion();
    }


    //méthode Ajouter un spectacle

    public function add(Spectacle $s){
        //$requete_Prepare = $this->db->prepare("INSERT INTO Spectacle (Titre, date, Lieu, img_Lieu, prix, musique)
        //VALUES(:titre, :date, :lieu, :img, :prix, :musique )");
        $titre = $s->getTitre();
        //$requete_Prepare->bindParem(':titre',$titre);
        $date = $s->getDate();
        //$requete_Prepare->bindParem(':date',$date);
        $heure = $s->getHeure();
        $lieu = $s->getLieu();
        //$requete_Prepare->bindParem(':lieu',$lieu);

        //$img = $s->getImg();

        //$requete_Prepare->bindParem(':lieu',$img);
        $prix = $s->getPrix();
        //$requete_Prepare->bindParem(':prix',$prix);
        $musique = $s->getMusique();
        //$requete_Prepare->bindParem(':musique',$musique);
        /*
        $requete_prepare_1=$PDO->prepare("SELECT pseudo,password FROM admin WHERE pseudo=:username AND password =:pass" );

        $requete_prepare_1->bindValue(":username",$pseudo_saisi);
        $requete_prepare_1->bindValue(":pass",$mdp_saisi);

        $requete_prepare_1->execute();
        */
        $requeteInsertion = "INSERT INTO Spectacle (Titre, date, heure, Lieu, img_Lieu, prix, musique) VALUES ('$titre', '$date', '$heure', '$lieu', 'tmp', '$prix', '$musique' )";

        #print_r($requeteInsertion);
        $requeteExistence = "SELECT * FROM Spectacle WHERE Titre='$titre'";
        $ExisteDeja = $this->db->query($requeteExistence);
        //Insertion que si le spectacle n'est pas déjà présent
        if ($ExisteDeja->rowcount()==0){
            $this->db->exec($requeteInsertion);

        }

    }
}
?>
