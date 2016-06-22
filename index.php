<?php
require_once "init.php";
// Debut de l'application
$page = new \Controller\PageController($pdo);

// Affichage de la liste (par defaut) ou ajout d'un message suivant action demandee

$action = 'lister';

if (isset($_GET['a'])) {
    $action = $_GET['a'];
}
switch($action){
    case 'modifier':
        $page->modifierAction();
        break;
    case 'supprimer':
        $page->supprimerAction();
        break;
    case 'lister':
    default:
        $page->listeAction();
        break;
}