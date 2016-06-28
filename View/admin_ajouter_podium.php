<?php
$title = "Ajouter un Podium";
include_once 'header.php' ?>

<div class="inner">

    <?php
    if(count($_POST) === 0) {
        ?>
        <!-- afficher le form -->
        <a class="link" href="index.php">Annuler</a>

        <h1>Ajouter un Podium</h1>

        <form action="" method="post">
            <label for="name">name</label><input id="name" name="name" type="text" placeholder="">
            <label for="id_competition">id_competition</label>
            <select name="id_competition">
                <?php foreach($compe as $data):?>
                    <option value="<?=$data->id?>"><?=$data->name?></option>
                <?php endforeach;?>
            </select>
            <br>
            <label for="id_winner">id_winner</label>
            <select name="id_winner">
                <?php foreach($pays as $data):?>
                    <option value="<?=$data->id?>"><?=$data->name?></option>
                <?php endforeach;?>
            </select>
            <br>
            <label for="id_second">id_second</label>
            <select name="id_second">
                <?php foreach($pays as $data):?>
                    <option value="<?=$data->id?>"><?=$data->name?></option>
                <?php endforeach;?>
            </select>
            <br>
            <label for="id_semi_1">id_semi_1</label>
            <select name="id_semi_1">
                <?php foreach($pays as $data):?>
                    <option value="<?=$data->id?>"><?=$data->name?></option>
                <?php endforeach;?>
            </select>
            <br>
            <label for="id_semi_2">id_semi_2</label>
            <select name="id_semi_2">
                <?php foreach($pays as $data):?>
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
            <p><strong>Succes !</strong> Le podium a été ajouté avec succès.</p>

            <a class="link" href="index.php">Retour a l'accueil</a>
            <br>
        </div>
        <?php

    }?>
</div>

<?php include_once 'footer.php' ?>