                                                                                                                                                                                                                                                                                                                                                                  <?php
// inclusion de l'autoload composer qui permet
// de ne pas faire les inclusions de classes a la main
require_once __DIR__."/vendor/autoload.php";
// connexion a la base de donnees
try{
    $pdo = new \PDO("mysql:host=localhost;dbname=foot_maj_3","root","root");
    $pdo->query("SET NAMES 'UTF8';");
}catch(PDOException $e){
    die($e->getMessage());
}