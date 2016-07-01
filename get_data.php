<?php
require_once __DIR__."/vendor/autoload.php";
require_once "init.php";

// Debut de l'application
$page = new \Controller\PageController($pdo);

if(count($_GET) === 0) {
    http_response_code(404);
} else {
    // traitement de la requete
    $page->getPays($_GET['pays']);
}

?>