<?php
namespace app\model;

use \app\entity\Musique;



class MusiqueModel extends Model{

    public function __construct()
    {
        $this->table="musique";
        parent::__construct($this->table);
    }


    public function findAll()
    {

        $listeMusique = $this->find();

        return $listeMusique;

    }


}