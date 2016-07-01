<?php
// connexion a la base de donnees
require_once __DIR__."/vendor/autoload.php";
require_once "init.php";

// Debut de l'application
$page = new \Controller\PageController($pdo);




if (isset($_GET['reponse']) && isset($_GET['question'])) {
    $reponse = $_GET['reponse'];
    $question = $_GET['question'];
} else {
    http_response_code(404);
}

$page->getGoodAnswer($reponse, $question);
?>
