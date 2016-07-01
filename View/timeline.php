<?php
$title = "Football-Anthem - Redécouvrez les hymnes du football";
include_once 'header.php' ?>

<div id="filtre_anim"></div>
<div id="div-burger" class="none">
    <a class="cross" href=""><img src="assets/images/crosswhite.svg"></a>
    <nav class="burger-nav">
        <ul>
            <li><a href="index.php?p=pays">Nations</a></li>
            <li><a href="index.php?p=dates">Compétitions</a></li>
            <li><a href="index.php?p=quizz">Quizz</a></li>
        </ul>
    </nav>
</div>
<header id="header-competitions">
    <a id="burger" class="none" href=""><img src="assets/images/burger.svg"></a>
    <h1 class="logo"><a href="index.php?p=timeline"><img id="logo" src="assets/images/logo.png"></a></h1>
    <nav class="main-nav">
        <ul>
            <li><a href="index.php?p=pays">Nations</a></li>
            <li><a href="index.php?p=dates">Compétitions</a></li>
            <li><a href="index.php?p=quizz">Quizz</a></li>
        </ul>
    </nav>
</header>
<div class="year-nav">

    <div class="prev <?php if(is_null($competition[0]['prev'])) { echo 'hidden'; }?>" <?php if(!is_null($competition[0]['prev'])) : ?>data-prev-id="<?php echo $competition[0]['prev']['id'] ?>"<?php endif ?>>
        <div class="year"><?php if(!is_null($competition[0]['prev'])) { echo date("Y", strtotime($competition[0]['prev']['date'])); } ?></div>
        <div class="circle"></div>
        <div class="line"></div>
        <div class="line-hover"></div>
    </div>

    <?php
      $date = date("Y", strtotime($competition[0]["c_date"]));
    ?>
    <div class="date"><?php echo $date ?></div>


    <div class="next <?php if(is_null($competition[0]['next'])) { echo 'hidden'; }?>" <?php if(!is_null($competition[0]['next'])) : ?>data-next-id="<?php echo $competition[0]['next']['id'] ?>"<?php endif ?>>
        <div class="line"></div>
        <div class="line-hover"></div>
        <div class="circle"></div>
        <div class="year"><?php if(!is_null($competition[0]['next'])) { echo date("Y", strtotime($competition[0]['next']['date'])); } ?></div>
    </div>

</div>
<section class="competitions">
    <div class="music">
        <h3><?= $competition[0]["compe"] ?> - <?= $competition[0]["orga"] ?></h3>
        <hr class="under-name">
        <h2><?=$competition[0]["c_hymne"]?></h2>
        <audio id="audio1" src="assets/musics/<?=$competition[0]["c_audio"]?>.mp3" type="audio/mp3"></audio>
        <a id="play-music-one" class="play-one calltoaction" href=""><span>Play</span> <img id="yellow" src="assets/images/triangle.svg"><img id="blue" class="none" src="assets/images/triangleblue.svg"></a>
        <a id="pause-music-one" class="play-one calltoaction none" href=""><span id="pause">Pause</span> <img id="yellow" src="assets/images/pauseyellow.svg"><img id="blue" class="none" src="assets/images/pauseblue.svg"></a>
        <!-- <a id="arrow" href=""><img src="images/arrow.svg"></a> -->
    </div>
    <div class="music-desc">
        <h4><?=$competition[0]["h_chanteur"]?></h4>
        <hr class="under-music-desc">
        <p><?=$competition[0]["h_desc"]?></p>
        <a class="quizz-share-btn fb" target="_blank" href="https://www.facebook.com/sharer.php?u=http://localhost/03%20-%20Semaines%20Intensives/Foot/Competitions.html&quote=Venez écouter We are One de Pitbull et Jennifer Lopez&hashtag=test&mobile_iframe=true"><img src="assets/images/fb.svg"> partager</a>
    </div>
    <div class="more-btns">
        <div class="more-infos-btn">
            <div class="circle"></div>
            <a id="more-infos" href="">En savoir plus</a>
        </div>
        <div class="more-musics-btn">
            <div class="circle"></div>
            <a id="more-musics" href="">Musique populaire</a>
        </div>
    </div>
    <img class="portraits" src="assets/images/portraits/<?=$competition[0]["c_visuel"]?>.png">



    <div id="div-more-infos" class="more-infos hidden">
        <a class="cross" href=""><img src="assets/images/cross.svg"></a>
        <img class="logo-competition" src="assets/images/competitions/<?=$competition[0]["c_image"]?>.png">
        <div class="participations">
            <span class="span">Participants</span>
            <hr>
            <div class="flags">
                <?php foreach($competition as $value):?>
                <img  class="clip-circle" src="assets/images/flags/<?=$value->pays_participant?>.png">
                <?php endforeach ?>
            </div>
        </div>
        <div class="finalistes">
            <span class="span">Finalistes</span>
            <hr>
            <div class="winner-list">
                <img  class="clip-circle" src="assets/images/flags/<?=$competition[0]["gagnant_flag"]?>.png">
                <p id="winner"><?=$competition[0]["c_gagnant"]?></p>
            </div>
            <ul>
                <li><span>2</span> <?=$competition[0]["c_finaliste"]?></li>
                <li><span>3</span> <?=$competition[0]["c_semi_1"]?></li>
                <li><span>4</span> <?=$competition[0]["c_semi_2"]?></li>
            </ul>
        </div>
        <div class="know">
            <span class="span">Le saviez-vous ?</span>
            <hr>
            <p><?=$competition[0]["c_description"]?></p>
        </div>
    </div>



    <div id="div-more-musics" class="more-musics hidden">
        <a class="cross" href=""><img src="assets/images/cross.svg"></a>
        <p class="more-musics-title">We are the champions</p>
        <p class="more-musics-artist">Queen, 1977</p>
        <audio id="audio2" src="assets/musics/Queen.mp3" type="audio/mp3"></audio>
        <a id="play-music-two" class="play-two calltoaction" href=""><span>Play</span> <img id="yellow" src="assets/images/triangle.svg"><img id="blue" class="none" src="assets/images/triangleblue.svg"></a>
        <a id="pause-music-two" class="play-two calltoaction none" href=""><span id="pause">Pause</span> <img id="yellow" src="assets/images/pauseyellow.svg"><img id="blue" class="none" src="assets/images/pauseblue.svg"></a>
        <a class="quizz-share-btn fb" href=""><img src="assets/images/fb.svg"> partager</a>
    </div>
</section>

<script src="assets/js/timeline.js"></script>
<script src="assets/js/timeline.scroll.js"></script>
<?php include_once 'footer.php' ?>
