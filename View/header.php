<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$title?></title>
    <link rel="icon" type="image/png" href="assets/images/fav.png">
    <link rel="stylesheet" href="assets/css/style_admin.css">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/jquery.min.js"></script>

    <?php
        if($route == "pays"){
            include_once ('includes_map.php');
        }
    ?>

</head>

<body <?php if($route == "home") { echo 'id="loading" class="unscroll"'; } ?>>