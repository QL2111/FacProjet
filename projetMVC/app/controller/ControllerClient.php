<?php

namespace app\controller;

use app\model\ClientModel;

class ControllerClient{
    private $model;

    public function __construct()
    {
        $this->model = new ClientModel();

    }

    public function ajouterClient($mail, $mdp, $nom,$prenom )
    {
        $this->model->addClient($mail, $mdp, $nom,$prenom );


    }

    public function recupMail($mail)
    {
        return $this->model->getMail($mail);

    }

    public function recupMdp($mail)
    {
        return $this->model->getMdp($mail);
    }

    public function recupId($mail)
    {
        return $this->model->getId($mail);
    }

    public function recupNom($mail)
    {
        return $this->model->getNom($mail);
    }

    public function recupPrenom($mail)
    {
        return $this->model->getPrenom($mail);
    }


}
?>
