<?php


class Database{
    private string $serveur = "localhost";
    private string $user = "user";
    private string $mdp = "user";
    private string $bd = "Art";
    private object $connexion;



    public function getConnexion(){

        try {
            $this->connexion = new PDO('mysql:host=' . $this->serveur . ';dbname=' . $this->bd, $this->user, $this->mdp);
            $this->connexion->exec("SET CHARACTER SET utf8");

        } //erreur
        catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
            echo 'N° : ' . $e->getCode();
        }

        return $this->connexion;

    }

}


?>
