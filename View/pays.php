<?php
$title = "Football-Anthem - Redécouvrez les hymnes du football";
include_once 'header.php' ?>

<div id="div-burger" class="none">
    <a class="cross" href=""><img src="assets/images/crosswhite.svg"></a>
    <nav class="burger-nav">
        <ul>
            <li><a href="index.php?p=pays">Nations</a></li>
            <li><a href="index.php?p=dates">Compétitions</a></li>
            <li><a href="index.php?p=quizz&id=1">Quizz</a></li>
        </ul>
    </nav>
</div>
<header id="header-map">
    <a id="burger" class="none" href=""><img src="assets/images/burger.svg"></a>
    <h1 class="logo"><a href="index.php?p=timeline"><img id="logo" src="assets/images/logo.png"></a></h1>
    <nav class="main-nav">
        <ul>
            <li><a class="active" href="index.php?p=pays">Nations</a></li>
            <li><a href="index.php?p=dates">Compétitions</a></li>
            <li><a href="index.php?p=quizz&id=1">Quizz</a></li>
        </ul>
    </nav>
</header>
<div id="list-pays">
    <ul>
        <? foreach($countries as $country) : ?>
        <li><a href="" data-name="<?= $country->name ?>"><img class="clip-circle" src="assets/images/flag/<?= $country->image_lien ?>.png"> <span><?= $country->name ?></span></a></li>
        <? endforeach ?>
    </ul>
</div>


<div class="map-popup none">
    <a class="cross" href=""><img src="assets/images/cross.svg"></a>
    <img  class="country-img clip-circle" src="assets/images/flag/flag_france.png">
    <h2>France</h2>
    <h3>La Marseillaise</h3>
    <div class="map-play">
        <audio id="audio1" src="assets/musics/hymne_pays/audio_hymne_france.mp3" type="audio/mp3"></audio>
        <a class="map-play-play" href=""><img src="assets/images/triangleblue.svg"></a>
        <p class="map-play-artist">Rouget de Lisle  -  1975</p>
    </div>
    <p class="map-popup-desc">Ego vero sic intellego, Patres conscripti, nos hoc tempore in provinciis decernendis perpetuae pacis habere oportere rationem. Nam quis hoc non sentit omnia alia esse nobis vacua ab omni periculo atque etiam suspicione belli?</p>
    <span class="span">Participations</span>
    <hr>
    <div class="map-popup-participations">
        <div class="coupe map-popup-one">
            <img src="assets/images/world.svg">
            <span>12</span>
        </div>
        <div class="euro map-popup-one">
            <img src="assets/images/europe.svg">
            <span>15</span>
        </div>
        <div class="award map-popup-one">
            <img src="assets/images/award.svg">
            <span>3</span>
        </div>
    </div>
    <a class="quizz-share-btn fb" href=""><img src="assets/images/fb.svg"> partager</a>
</div>

<!-- <div style="height: 400px"></div> -->
<div id="map1" style="width: 100%; height: 100vh"></div>


<?php include_once 'footer.php' ?>
