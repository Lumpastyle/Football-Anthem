<?php
require_once "init.php";
// Debut de l'application
$page = new \Controller\PageController($pdo);

// Affichage de la liste (par defaut) ou ajout d'un message suivant action demandee

$route = 'home';

if (isset($_GET['p'])) {
    $route = $_GET['p'];
}
switch($route){
    case 'timeline':
        $page->timelineAction();
        break;
    case 'dates':
        $page->datesAction();
        break;
    case 'pays':
        $page->paysAction();
        break;
    case 'quizz':
        $page->quizzAction();
        break;
    case 'home':
    default:
        $page->homeAction();
        break;
}