<?php
$title = "Ajouter une chanson populaire";
include_once 'header.php' ?>

<div class="inner">

    <?php
    if(count($_POST) === 0) {
        ?>
        <!-- afficher le form -->
        <a class="link" href="index.php">Annuler</a>

        <h1>Ajouter une chanson populaire</h1>

        <form action="" method="post">
            <label for="name">name</label><input id="name" name="name" type="text" placeholder="">
            <label for="id_competition">id_competition</label>
            <select name="id_competition">
                <?php foreach($competition as $data):?>
                    <option value="<?=$data->id?>"><?=$data->name?></option>
                <?php endforeach;?>
            </select>
            <br>
            <label for="description">description</label><input id="description" name="description" type="text" placeholder="Chanteur, 2001">
            <label for="audio">audio</label><input id="audio" name="audio" type="text" placeholder="">
            <br>
            <input type="submit" value="Valider">
        </form>
        <?php
    } else {
        ?>
        <!-- traitement de la form -->
        <div class="success">
            <p><strong>Succes !</strong> La chanson a été ajoutée avec succès.</p>

            <a class="link" href="index.php">Retour a l'accueil</a>
            <br>
        </div>
        <?php

    }?>
</div>

<?php include_once 'footer.php' ?>