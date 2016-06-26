<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Base de données - Projet Football</title>
        <link href="../assets/css/style.css" rel="stylesheet">
    </head>

    <body>
        <div class="inner">

            <h1>Liste des tables</h1>

            <h2>Compétition</h2>

            <table>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>type</th>
                    <th>date</th>
                    <th>id_organisateur</th>
                    <th>id_hymne</th>
                    <th>id_image</th>
                    <th>description</th>
                    <th class="action">Actions</th>
                </tr>
                <?php if (count($compe) == 0 ):?>
                    <tr>
                        <td colspan="9">
                            Pas de data
                        </td>
                    </tr>
                <?php endif;?>
                <?php foreach($compe as $data):?>
                    <tr>
                        <td><?=$data->id?></td>
                        <td><?=$data->name?></td>
                        <?php
                        if($data->type == 1){
                            ?>
                            <td>Euro</td>
                            <?php
                        } else {
                            ?>
                            <td>Coupe du monde</td>
                        <?php } ?>
                        <td><?=$data->date?></td>
                        <td><?=$data->id_organisateur?></td>
                        <td><?php if($data->id_hymne == "107"){
                                echo "Aucun";
                            } else {
                                echo $data->id_hymne;
                            }?></td>
                        <td><?=$data->id_image?></td>
                        <td><?=$data->description?></td>
                        <td class="action">
                            <a class="modifier" href="?a=modifier&id=<?=$data->id?>&type=competition">Edit</a>
                            <a class="supprimer" href="?a=supprimer&id=<?=$data->id?>&type=competition">Delete</a>
                        </td>
                    </tr>
                <?php endforeach;?>
            </table>
            <a class="ajouter" href="index.php?a=ajouter&type=competition">Ajouter une nouvelle competition</a>
            <br>

            <h2>Pays</h2>

            <table>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>id_hymne</th>
                    <th>nb_euro</th>
                    <th>nb_world</th>
                    <th>win_euro</th>
                    <th>win_world</th>
                    <th>description</th>
                    <th>id_image</th>
                    <th class="action">Actions</th>
                </tr>
                <?php if (count($pays) == 0 ):?>
                    <tr>
                        <td colspan="10">
                            Pas de data
                        </td>
                    </tr>
                <?php endif;?>
                <?php foreach($pays as $data):?>
                    <tr>
                        <td><?=$data->id?></td>
                        <td><?=$data->name?></td>
                        <td><?=$data->id_hymne?></td>
                        <td><?=$data->nb_euro?></td>
                        <td><?=$data->nb_world?></td>
                        <td><?=$data->win_euro?></td>
                        <td><?=$data->win_world?></td>
                        <td><?=$data->description?></td>
                        <td><?=$data->id_image?></td>
                        <td class="action">
                            <a class="modifier" href="?a=modifier&id=<?=$data->id?>&type=pays">Edit</a>
                            <a class="supprimer" href="?a=supprimer&id=<?=$data->id?>&type=pays">Delete</a>
                        </td>
                    </tr>
                <?php endforeach;?>
            </table>
            <a class="ajouter" href="index.php?a=ajouter&type=pays">Ajouter un nouveau pays</a>
            <br>

            <h2>Hymne</h2>

            <table>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>date</th>
                    <th>auteur</th>
                    <th>chanteur</th>
                    <th>description</th>
                    <th>audio</th>
                    <th class="action">Actions</th>
                </tr>
                <?php if (count($hymne) == 0 ):?>
                    <tr>
                        <td colspan="8">
                            Pas de data
                        </td>
                    </tr>
                <?php endif;?>
                <?php foreach($hymne as $data):?>
                    <tr>
                        <td><?=$data->id?></td>
                        <td><?=$data->name?></td>
                        <td><?=$data->date?></td>
                        <td><?=$data->auteur?></td>
                        <td><?=$data->chanteur?></td>
                        <td><?=$data->description?></td>
                        <td><?=$data->audio?></td>
                        <td class="action">
                            <a class="modifier" href="?a=modifier&id=<?=$data->id?>&type=hymne">Edit</a>
                            <a class="supprimer" href="?a=supprimer&id=<?=$data->id?>&type=hymne">Delete</a>
                        </td>
                    </tr>
                <?php endforeach;?>
            </table>
            <a class="ajouter" href="index.php?a=ajouter&type=hymne">Ajouter une nouvelle hymne</a>
            <br>

            <h2>Images</h2>

            <table>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>lien</th>
                    <th class="action">Actions</th>
                </tr>
                <?php if (count($image) == 0 ):?>
                    <tr>
                        <td colspan="4">
                            Pas de data
                        </td>
                    </tr>
                <?php endif;?>
                <?php foreach($image as $data):?>
                    <tr>
                        <td><?=$data->id?></td>
                        <td><?=$data->name?></td>
                        <td><?=$data->lien?></td>
                        <td class="action">
                            <a class="modifier" href="?a=modifier&id=<?=$data->id?>&type=image">Edit</a>
                            <a class="supprimer" href="?a=supprimer&id=<?=$data->id?>&type=image">Delete</a>
                        </td>
                    </tr>
                <?php endforeach;?>
            </table>
            <a class="ajouter" href="index.php?a=ajouter&type=image">Ajouter une nouvelle image</a>
            <br>

            <h2>Podiums</h2>

            <table>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>id_competition</th>
                    <th>id_winner</th>
                    <th>id_second</th>
                    <th>id_semi_1</th>
                    <th>id_semi_2</th>
                    <th class="action">Actions</th>
                </tr>
                <?php if (count($podium) == 0 ):?>
                    <tr>
                        <td colspan="8">
                            Pas de data
                        </td>
                    </tr>
                <?php endif;?>
                <?php foreach($podium as $data):?>
                    <tr>
                        <td><?=$data->id?></td>
                        <td><?=$data->name?></td>
                        <td><?=$data->id_competition?></td>
                        <td><?=$data->id_winner?></td>
                        <td><?=$data->id_second?></td>
                        <td><?=$data->id_semi_1?></td>
                        <td><?=$data->id_semi_2?></td>
                        <td class="action">
                            <a class="modifier" href="?a=modifier&id=<?=$data->id?>&type=podium">Edit</a>
                            <a class="supprimer" href="?a=supprimer&id=<?=$data->id?>&type=podium">Delete</a>
                        </td>
                    </tr>
                <?php endforeach;?>
            </table>
            <a class="ajouter" href="index.php?a=ajouter&type=podium">Ajouter un nouveau podium</a>
            <br>

            <h2>Participants</h2>

            <table>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>id_competition</th>
                    <th>id_pays</th>
                    <th class="action">Actions</th>
                </tr>
                <?php if (count($participants) == 0 ):?>
                    <tr>
                        <td colspan="5">
                            Pas de data
                        </td>
                    </tr>
                <?php endif;?>
                <?php foreach($participants as $data):?>
                    <tr>
                        <td><?=$data->id?></td>
                        <td><?=$data->name?></td>
                        <td><?=$data->id_competition?></td>
                        <td><?=$data->id_pays?></td>
                        <td class="action">
                            <a class="modifier" href="?a=modifier&id=<?=$data->id?>&type=participants">Edit</a>
                            <a class="supprimer" href="?a=supprimer&id=<?=$data->id?>&type=participants">Delete</a>
                        </td>
                    </tr>
                <?php endforeach;?>
            </table>
            <a class="ajouter" href="index.php?a=ajouter&type=participants">Ajouter une nouvelle liste de participants</a>
            <br>

        </div>
    </body>
</html>