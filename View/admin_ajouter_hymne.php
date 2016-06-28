<?php
$title = "Ajouter une Hymne";
include_once 'header.php' ?>

<div class="inner">

    <?php
    if(count($_POST) === 0) {
        ?>
        <!-- afficher le form -->
        <a class="link" href="index.php">Annuler</a>

        <h1>Ajouter une Hymne</h1>

        <form action="" method="post">
            <label for="name">name</label><input id="name" name="name" type="text" placeholder="hymne_euro OU hymne_pays">
            <label for="date">date</label><input id="date" name="date" type="datetime" placeholder="2016-06-10 (a-m-j)">
            <label for="auteur">auteur</label><input id="auteur" name="auteur" type="text" placeholder="David Guetta">
            <label for="chanteur">chanteur</label><input id="chanteur" name="chanteur" type="text" placeholder="Zara Larsson">
            <label for="description">description</label><textarea id="description" name="description" type="text" placeholder="Pas de fautes pls !"></textarea>
            <label for="audio">audio</label><input id="audio" name="audio" type="text" placeholder="audio_hymne_euro OU audio_hymne_pays">
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

<?php include_once 'footer.php' ?>