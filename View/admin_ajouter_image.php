<?php
$title = "Ajouter une Image";
include_once 'header.php' ?>

<div class="inner">

    <?php
    if(count($_POST) === 0) {
        ?>
        <!-- afficher le form -->
        <a class="link" href="index.php">Annuler</a>

        <h1>Ajouter une Image</h1>

        <form action="" method="post">
            <label for="name">name</label><input id="name" name="name" type="text" placeholder="logo_euro OU flag_pays">
            <label for="lien">lien</label><input id="lien" name="lien" type="text" placeholder="logo_euro OU flag_pays">
            <br>
            <input type="submit" value="Valider">
        </form>
        <?php
    } else {
        ?>
        <!-- traitement de la form -->
        <div class="success">
            <p><strong>Succes !</strong> L'image a été ajoutée avec succès.</p>

            <a class="link" href="index.php">Retour a l'accueil</a>
            <br>
        </div>
        <?php

    }?>
</div>

<?php include_once 'footer.php' ?>