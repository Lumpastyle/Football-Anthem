<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une compétition</title>
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>
<div class="inner">

<?php
if(count($_POST) === 0) {
?>
        <!-- afficher le form -->
        <a class="link" href="index.php">Annuler</a>

        <h1>Ajouter un Pays</h1>

        <form action="" method="post">
            <label for="name">name</label><input id="name" name="name" type="text" placeholder="France">
            <label for="id_hymne">id_hymne</label>
            <select name="id_hymne">
<?php foreach($hymne as $data):?>
                <option value="<?=$data->id?>"><?=$data->name?></option>
<?php endforeach;?>
            </select>
            <br>
            <label for="nb_euro">nb_euro</label><input id="nb_euro" name="nb_euro" type="text" placeholder="6">
            <label for="nb_world">nb_world</label><input id="nb_world" name="nb_world" type="text" placeholder="2">
            <label for="win_euro">win_euro</label><input id="win_euro" name="win_euro" type="text" placeholder="1">
            <label for="win_world">win_world</label><input id="win_world" name="win_world" type="text" placeholder="0">
            <label for="description">description</label><textarea id="description" name="description" type="text" placeholder="Pas de fautes pls !"></textarea>
            <label for="id_image">id_image</label>
            <select name="id_image">
<?php foreach($image as $data):?>
                <option value="<?=$data->id?>"><?=$data->name?></option>
<?php endforeach;?>
            </select>
            <br>
            <input type="submit" value="Valider">
        </form>
<?php
} else {
?>
        <!-- traitement de la form -->
        <div class="success">
            <p><strong>Succes !</strong> Le Pays a été ajouté avec succès.</p>

            <a class="link" href="index.php">Retour a l'accueil</a>
            <br>
        </div>
<?php

}?>
</div>
</body>
</html>
