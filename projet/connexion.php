<?php

//variables constantes(define)
define("SERVEUR", "localhost");
define("USER", "user");
define("MDP", "user");
define("BD", "Art");

//connexion(try)
try {
    $connexion = new PDO('mysql:host=' . SERVEUR . ';dbname=' . BD, USER, MDP);
    $connexion->exec("SET CHARACTER SET utf8");
} //erreur
catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
}

?>