<?php

namespace app\controller;

use app\entity\Spectacle;
use app\model\SpectacleModel;

class ControllerSpectacle{
    private $model;

    public function __construct()
    {
        $this->model = new SpectacleModel();

    }

    public function getAll()
    {


        $content=$this->model->findAll();

        include('app/view/getAllSpectacle.php');

    }

    public function recupArticle($numArticle)
    {
        $article = $this->model->getArticle($numArticle);
        //Stockage dans une session des informations de l'article pour l'envoyer vers le panier
        $_SESSION['id_spectacle'] = $article->id_spectacle;
        $_SESSION['prix_spectacle'] = $article->prix;
        $_SESSION['date'] = $article->date;
        $_SESSION['img'] = $article->img_Lieu;
        include ('app/view/vue_produit.php');
    }

    public function ajouterSpectacle(Spectacle $s){
        $this->model->addSpectacle($s);
    }
}
?>
