<?php
namespace app\model;

use app\config\Database;
use \PDO;



class Model{

    protected string $table;

    private \PDO $connexion;



    public function __construct( )
    {

        $db = new Database();


        $this->connexion=$db->getConnection();
    }



    public function find($data = array()) : array
    {
        $requete1 = "SELECT * FROM " . $this->table;
       $prepa = $this->connexion->prepare($requete1);
        $prepa->execute();
        $data = $prepa->fetchAll(PDO::FETCH_OBJ);

        return $data;

    }




   






}