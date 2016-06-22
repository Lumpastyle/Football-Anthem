<?php

chdir($rootDir = dirname(__DIR__));

require_once "init.php";
// Debut de l'application
$page = new \Controller\PageController($pdo);

$action = 'lister';

if (isset($_GET['a'])) {
    $action = $_GET['a'];
}
switch($action){
    case 'ajouter':
        $page->ajoutAction();
        break;
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