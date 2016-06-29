<?php
$title = "Football-Anthem - Redécouvrez les hymnes du football";
include_once 'header.php' ?>

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
<header id="header-quizz">
    <a id="burger" class="none" href=""><img src="assets/images/burger.svg"></a>
    <h1 class="logo"><a href="index.php?p=timeline"><img id="logo" src="assets/images/logo.png"></a></h1>
    <nav class="main-nav">
        <ul>
            <li><a href="index.php?p=pays">Nations</a></li>
            <li><a href="index.php?p=dates">Compétitions</a></li>
            <li><a class="active" href="index.php?p=quizz">Quizz</a></li>
        </ul>
    </nav>
</header>
<div class="quizz">
    <div class="goal-tracker">
        <div class="progress-circle">
            <div class="outer">
                <div class="half spinner"></div>
                <div class="half filler"></div>
                <div class="mask"></div>
            </div>
            <div class="inner"></div>
            <div class="goal-tracker__content">
                <div class="goal-tracker__data">
                    <span class="percentage"><span id="plus">1</span>/5</span>
                    <img id="check" class="none" src="assets/images/check.svg">
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="question">
        <p>L’hymne ‘We are One’ a été joué pour :</p>
        <button class="good" type="button" name="">La Coupe du Monde de 1998</button>
        <button type="button" name="">Le Championnat d’Europe de 2004 </button>
        <button type="button" name="">La Coupe du Monde de 2014</button>
        <a class="calltoaction next" href="">Suivant</a>
    </div>
    <div class="quizz-score none">
        <h2>Score final</h2>
        <div class="quizz-result">
            <div class="quizz-good">
                <p>Bonne réponses <span>04</span></p>
            </div>
            <div class="quizz-bad">
                <p>Mauvaises réponses <span>01</span></p>
            </div>
        </div>
        <div class="quizz-share">
            <a id="replay" class="quizz-share-btn restart" href=""><img src="assets/images/arrow.svg"> rejouer</a>
            <a class="quizz-share-btn fb" href=""><img src="assets/images/fb.svg"> partager</a>
            <a class="quizz-share-btn twitter" href=""><img src="assets/images/twitter.svg"> partager</a>
        </div>
    </div>
</div>

<script>

    jQuery(function(){

        $("header #burger").click(function(e){
            e.preventDefault();
            $('#div-burger').removeClass('none');
            $('header #burger').addClass('hidden');

            $('#header-quizz').addClass('none');
            $('.quizz').addClass('none');
        });

        $("#div-burger .cross").click(function(e){
            e.preventDefault();
            $('#div-burger').addClass('none');
            $('header #burger').removeClass('hidden');

            $('#header-quizz').removeClass('none');
            $('.quizz').removeClass('none');
        });


        var countQuestion = document.querySelector("#plus");
        var count = 1;

        $('.quizz-score').css({
            'display' : 'none'
        });

        $(".question .next").click(function(e){
            e.preventDefault();
            if (count <= 4){
                count += 1;
                countQuestion.innerHTML = count;
            } else if (count >= 5) {
                $(".question").addClass('none');
                $('.quizz-score').css({
                    'display' : 'block'
                });
                $(".goal-tracker__data .percentage").addClass('none');
                $(".goal-tracker__data #check").removeClass('none');
            }

        })

        $(".quizz-share #replay").click(function(e){
            e.preventDefault();
            count = 1;
            countQuestion.innerHTML = count;
            $('.quizz-score').css({
                'display' : 'none'
            });
            $(".question").removeClass('none');
            $(".goal-tracker__data .percentage").removeClass('none');
            $(".goal-tracker__data #check").addClass('none');
        });





    })
</script>

<?php include_once 'footer.php' ?>