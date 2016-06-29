<?php 

// connexion a la base de donnees
try{
    $pdo = new \PDO("mysql:host=localhost;dbname=foot","root","root");
    $pdo->query("SET NAMES 'UTF8';");
}catch(PDOException $e){
    die($e->getMessage());
}

/**
 * @param $id
 * @return mixed
 */
function getPaysByName($pdo, $name){
    $sql ="SELECT
                `id`,
                `name`,
                `id_hymne`,
                `nb_euro`,
                `nb_world`,
                `description`,
                `id_image`
            FROM
                `pays`
            WHERE
                `name` = :name
            ";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name',$name,\PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchObject();
}

if(count($_GET) === 0) {
    // ne rien faire
} else {
    // traitement de la requete
    $pays = getPaysByName($pdo, $_GET['pays']);
    $response = [];

    if($pays == false) {
    	$response['type'] = "error";
    	$response['message'] = "Pays non référencé";
    } else {
    	$response['type'] = "success";
    	$response['pays']['id'] = $pays->id;
	    $response['pays']['name'] = $pays->name;
	    $response['pays']['id_hymne'] = $pays->id_hymne;
	    $response['pays']['nb_euro'] = $pays->nb_euro;
	    $response['pays']['nb_world'] = $pays->nb_world;
	    $response['pays']['description'] = $pays->description;
	    $response['pays']['id_image'] = $pays->id_image;
    }
    

    
    
    echo json_encode($response);
}