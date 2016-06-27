<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une question</title>
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>
<div class="inner">

    <?php
    if(count($_POST) === 0) {
        ?>
        <!-- afficher le form -->
        <a class="link" href="index.php">Annuler</a>

        <h1>Ajouter une question</h1>

        <form action="" method="post">
            <label for="question">question</label><input id="question" name="question" type="text" placeholder="">
            <label for="reponse_1">reponse_1</label><input id="reponse_1" name="reponse_1" type="text" placeholder="">
            <label for="reponse_2">reponse_2</label><input id="reponse_2" name="reponse_2" type="text" placeholder="">
            <label for="reponse_3">reponse_3</label><input id="reponse_3" name="reponse_3" type="text" placeholder="">
            <label for="bonne_reponse">bonne_reponse</label><input id="bonne_reponse" name="bonne_reponse" type="text" placeholder="1-2-3">
            <br>
            <input type="submit" value="Valider">
        </form>
        <?php
    } else {
        ?>
        <!-- traitement de la form -->
        <div class="success">
            <p><strong>Succes !</strong> La question a été ajoutée avec succès.</p>

            <a class="link" href="index.php">Retour a l'accueil</a>
            <br>
        </div>
        <?php

    }?>
</div>
</body>
</html>