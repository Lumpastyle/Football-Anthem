<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Ajouter une Compétition</title>
        <link href="../assets/css/style.css" rel="stylesheet">
    </head>

    <body>
        <div class="inner">

<?php
if(count($_POST) === 0) {
?>
    <!-- afficher le form -->
        <a class="link" href="index.php">Annuler</a>

        <h1>Ajouter une Compétition</h1>

        <form action="" method="post">
            <label for="name">name</label><input id="name" name="name" type="text" placeholder="">
            <label for="type">type</label><input id="type" name="type" type="text" placeholder="">
            <label for="date">date</label><input id="date" name="date" type="datetime" placeholder="">
            <label for="id_organisateur">id_organisateur</label>
            <select name="id_organisateur">
<?php foreach($pays as $data):?>
                <option value="<?=$data->id?>"><?=$data->name?></option>
<?php endforeach;?>
            </select>
            <br>
            <label for="id_hymne">id_hymne</label>
            <select name="id_hymne">
<?php foreach($hymne as $data):?>
                <option value="<?=$data->id?>"><?=$data->name?></option>
<?php endforeach;?>
            </select>
            <br>
            <label for="id_image">id_image</label>
            <select name="id_image">
<?php foreach($image as $data):?>
                <option value="<?=$data->id?>"><?=$data->name?></option>
<?php endforeach;?>
            </select>
            <br>
            <label for="description">description</label><textarea id="description" name="description" type="text" placeholder=""></textarea>
            <br>
            <input type="submit" value="Valider">
        </form>
<?php
} else {
?>
        <!-- traitement de la form -->
        <div class="success">
            <p><strong>Succes !</strong> La compétition a été ajoutée avec succès.</p>

            <a class="link" href="index.php">Retour a l'accueil</a>
            <br>
        </div>
<?php

}?>
        </div>
    </body>
</html>
