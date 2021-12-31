<?php

namespace app\controller;

use app\model\MusiqueModel;

class ControllerMusique{
    private $model;

    public function __construct()
    {
        $this->model = new MusiqueModel();

    }

    public function getAll()
    {


        $content=$this->model->findAll();

        include('app/view/getAllMusique.php');

    }


}
?>
