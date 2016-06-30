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
            <li><a href="index.php?p=quizz&id=1">Quizz</a></li>
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
            <li><a href="index.php?p=quizz&id=1">Quizz</a></li>
        </ul>
    </nav>
</header>
<div class="year-nav">

    <div class="prev <?php if(is_null($competition->prev)) { echo 'hidden'; }?>" <?php if(!is_null($competition->prev)) : ?>data-prev-id="<?php echo $competition->prev['id'] ?>"<?php endif ?>>
        <div class="year"><?php if(!is_null($competition->prev)) { echo date("Y", strtotime($competition->prev['date'])); } ?></div>
        <div class="circle"></div>
        <div class="line"></div>
        <div class="line-hover"></div>
    </div>

    <?php
      $date = date("Y", strtotime($competition->date));
    ?>
    <div class="date"><?php echo $date ?></div>


    <div class="next <?php if(is_null($competition->next)) { echo 'hidden'; }?>" <?php if(!is_null($competition->next)) : ?>data-next-id="<?php echo $competition->next['id'] ?>"<?php endif ?>>
        <div class="line"></div>
        <div class="line-hover"></div>
        <div class="circle"></div>
        <div class="year"><?php if(!is_null($competition->next)) { echo date("Y", strtotime($competition->next['date'])); } ?></div>
    </div>

</div>
<section class="competitions">
    <div class="music">
        <h3><?php echo $competition->name ?> - Brésil</h3>
        <hr class="under-name">
        <h2>We are one</h2>
        <audio id="audio1" src="assets/musics/Queen.mp3" type="audio/mp3"></audio>
        <a id="play-music-one" class="play-one calltoaction" href=""><span>Play</span> <img id="yellow" src="assets/images/triangle.svg"><img id="blue" class="none" src="assets/images/triangleblue.svg"></a>
        <a id="pause-music-one" class="play-one calltoaction none" href=""><span id="pause">Pause</span> <img id="yellow" src="assets/images/pauseyellow.svg"><img id="blue" class="none" src="assets/images/pauseblue.svg"></a>
        <!-- <a id="arrow" href=""><img src="images/arrow.svg"></a> -->
    </div>
    <div class="music-desc">
        <h4>Pitbull, Jennifer Lopez, 2004</h4>
        <hr class="under-music-desc">
        <p>La chanson "We are One" succède au "Waka Waka" de la Colombienne Shakira en 2010.</p>
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
    <img class="portraits" src="assets/images/portraits/cristiano.png">



    <div id="div-more-infos" class="more-infos hidden">
        <a class="cross" href=""><img src="assets/images/cross.svg"></a>
        <img class="logo-competition" src="assets/images/competitions/brasil.png">
        <div class="participations">
            <span class="span">Participants</span>
            <hr>
            <div class="flags">
                <img  class="clip-circle" src="assets/images/flags/allemagne.png">
                <img  class="clip-circle" src="assets/images/flags/france.png">
                <img  class="clip-circle" src="assets/images/flags/italie.png">
                <img  class="clip-circle" src="assets/images/flags/suisse.png">
                <img  class="clip-circle" src="assets/images/flags/allemagne.png">
                <img  class="clip-circle" src="assets/images/flags/france.png">
                <img  class="clip-circle" src="assets/images/flags/italie.png">
                <img  class="clip-circle" src="assets/images/flags/suisse.png">
                <img  class="clip-circle" src="assets/images/flags/allemagne.png">
                <img  class="clip-circle" src="assets/images/flags/france.png">
                <img  class="clip-circle" src="assets/images/flags/italie.png">
                <img  class="clip-circle" src="assets/images/flags/suisse.png">
            </div>
        </div>
        <div class="finalistes">
            <span class="span">Finalistes</span>
            <hr>
            <div class="winner-list">
                <img  class="clip-circle" src="assets/images/flags/allemagne.png">
                <p id="winner">Allemagne</p>
            </div>
            <ul>
                <li><span>2</span> France</li>
                <li><span>3</span> Italie</li>
                <li><span>4</span> Suisse</li>
            </ul>
        </div>
        <div class="know">
            <span class="span">Le saviez-vous ?</span>
            <hr>
            <p>Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum. Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum. Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum. Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum.</p>
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


<div class="background-scroll"></div>

<script src="assets/js/timeline.js"></script>
<script src="assets/js/timeline.scroll.js"></script>
<?php include_once 'footer.php' ?>
