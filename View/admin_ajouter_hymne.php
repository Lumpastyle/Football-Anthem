<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une Hymne</title>
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>
<div class="inner">

    <?php
    if(count($_POST) === 0) {
        ?>
        <!-- afficher le form -->
        <a class="link" href="index.php">Annuler</a>

        <h1>Ajouter une Hymne</h1>

        <form action="" method="post">
            <label for="name">name</label><input id="name" name="name" type="text" placeholder="">
            <label for="date">date</label><input id="date" name="date" type="datetime" placeholder="">
            <label for="auteur">auteur</label><input id="auteur" name="auteur" type="text" placeholder="">
            <label for="chanteur">chanteur</label><input id="chanteur" name="chanteur" type="text" placeholder="">
            <label for="description">description</label><textarea id="description" name="description" type="text" placeholder=""></textarea>
            <label for="audio">audio</label><input id="audio" name="audio" type="text" placeholder="">
            <br>
            <input type="submit" value="Valider">
        </form>
        <?php
    } else {
        ?>
        <!-- traitement de la form -->
        <div class="success">
            <p><strong>Succes !</strong> L'hymne a été ajoutée avec succès.</p>

            <a class="link" href="index.php">Retour a l'accueil</a>
            <br>
        </div>
        <?php

    }?>
</div>
</body>
</html>
