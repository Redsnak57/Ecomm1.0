<?php
    $host = "localhost";
    $user= "root";
    $mdp = "";
    $char="utf8";
    $dbname = "ecom";

    try {
        $bdd = new PDO ("mysql:host=$host;dbname=$dbname;char=$char", $user, $mdp);
    } catch (PDOException $e) {
        echo "erreur : $e -> getMessage()";
    }

?>