<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Base de données - Projet Football</title>
        <link href="../assets/css/style.css" rel="stylesheet">
    </head>

    <body>

        <div class="inner">
            <a class="link" href="index.php">Annuler modification</a>
<?php
if(count($_POST) === 0) {
?>
            <!-- afficher le form -->
            <h1>Modifier le message <?=$data->id?></h1>

            <form action="" method="post">
                <input type="text" value="<?=$data->id?>" disabled readonly style="display:none;">
                <label for="message">Message</label><textarea id="message" name="message"><?=$data->message?></textarea>
                <br>
                <input type="submit" value="Envoyer vers validation">
            </form>
<?php
} else {
?>
            <!-- traitement de la form -->
            <div class="success">
                <p><strong>Succes !</strong> La page a ete envoyee avec succes.</p>

                <a class="link" href="index.php">Retour a l'accueil</a>
                <br>
            </div>
<?php


}?>

            <footer>
                <span>PARTIEL PHP - DIAS ANTHONY - WEB1 P2018</span>
            </footer>
        </div>
    </body>
</html>
