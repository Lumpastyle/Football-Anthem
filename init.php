<?php
// inclusion de l'autoload composer qui permet
// de ne pas faire les inclusions de classes a la main
require_once __DIR__."/vendor/autoload.php";
// connexion a la base de donnees
try{
    //$pdo = new \PDO("mysql:host=localhost;dbname=foot","root","root");
    $pdo = new \PDO("mysql:host=phpmyadmin.nine-baguettes.fr;dbname=football_anthem","a.dias","liminou74");
    $pdo->query("SET NAMES 'UTF8';");
}catch(PDOException $e){
    die($e->getMessage());
}