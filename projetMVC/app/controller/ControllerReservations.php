<?php

namespace app\controller;

use app\model\ReservationsModel;

class ControllerReservations{
    private $model;

    public function __construct()
    {
        $this->model = new ReservationsModel();

    }

    public function recupReservations($id_client)
    {


        $content=$this->model->findSpectacles($id_client);

        include('app/view/getAllReservations.php');

    }

    public function ajouterReservation($idClient, $prixFinal, $date, $id_spectacle)
    {
        $this->model->addReversation($idClient, $prixFinal, $date, $id_spectacle);
    }

}
?>
