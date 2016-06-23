<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une liste de participants</title>
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>
<div class="inner">

    <?php
    if(count($_POST) === 0) {
        ?>
        <!-- afficher le form -->
        <a class="link" href="index.php">Annuler</a>

        <h1>Ajouter une liste de participants</h1>

        <form action="" method="post">
            <label for="name">name</label><input id="name" name="name" type="text" placeholder="">
            <label for="id_competition">id_competition</label>
            <select name="id_competition">
                <?php foreach($competition as $data):?>
                    <option value="<?=$data->id?>"><?=$data->name?></option>
                <?php endforeach;?>
            </select>
            <br>
            <label for="">Pays participants</label>
            <?php foreach($pays as $data):?>
                <input type="checkbox" name="id_pays[]" id="<?=$data->id?>" value="<?=$data->name?>"><?=$data->name?>
            <?php endforeach;?>
            <br>
            <input type="submit" value="Valider">
        </form>
        <?php
    } else {
        ?>
        <!-- traitement de la form -->
        <div class="success">
            <p><strong>Succes !</strong> La liste a été ajoutée avec succès.</p>

            <a class="link" href="index.php">Retour a l'accueil</a>
            <br>
        </div>
        <?php

    }?>
</div>
</body>
</html>
