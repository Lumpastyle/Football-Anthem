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
<header id="header-quizz">
    <a id="burger" class="none" href=""><img src="assets/images/burger.svg"></a>
    <h1 class="logo"><a href="index.php?p=timeline"><img id="logo" src="assets/images/logo.png"></a></h1>
    <nav class="main-nav">
        <ul>
            <li><a href="index.php?p=pays">Nations</a></li>
            <li><a href="index.php?p=dates">Compétitions</a></li>
            <li><a class="active" href="index.php?p=quizz&id=1">Quizz</a></li>
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


        <?php

        $questions=[];
        $i = 1;
        $countGoddAnswers = 0;

        foreach($quizz as $index => $one):;?>

    <div class="question <?=$index?> <? if($index > 0) :?>none<? endif ?>" data-id-question="<?=$one->id?>" >
            <p><?=$one->question?></p>
            <button class="button 1" data-reponse="1" type="button" name=""><?=$one->reponse_1?></button>
            <button class="button 2" data-reponse="2" type="button" name=""><?=$one->reponse_2?></button>
            <button class="button 3" data-reponse="3" type="button" name=""><?=$one->reponse_3?></button>

            <a class="calltoaction next hidden" href="">Suivant</a>
    </div>
        <?php endforeach;?>



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

        var actualQuestion = 0;
        var goodAnswers = 0;

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

        $(".question .button").click(function(e){
            e.preventDefault();


            var _this = $(this);
            var reponse = $(this).data('reponse');
            var parent = $(this).parent();
            var question = parent.data('id-question');


            if(parent.hasClass('disable')){
                return;
            }

            $.ajax({
                url:"quizz_answers.php",
                type: 'GET',
                data: {'reponse': reponse, 'question': question},
                dataType: 'json',
                success:function(data) {
                    if(!data.is_good) {
                        _this.addClass('bad');
                        parent.find('button.' + data.bonne_reponse).addClass('good');
                    } else {
                        _this.addClass('good');
                        goodAnswers++;
                    }
                    $('.calltoaction.next').removeClass('hidden');

                    parent.addClass('disable');
                    console.log('nb bonne réponses', goodAnswers);
                }
            });


        });

        $('.calltoaction.next').click(function(e){
            e.preventDefault();

            $('.question.' + actualQuestion).addClass('none');

            if(actualQuestion == 4) {

                $(".goal-tracker__data .percentage").addClass('none');
                $(".goal-tracker__data #check").removeClass('none');

                $('.quizz-score').removeClass('none');
                $('.quizz-good span').html(goodAnswers);
                var total = 5;
                var badAnswers = total-goodAnswers;
                $('.quizz-bad span').html(badAnswers);
                return;
            }


            $('.question.' + actualQuestion).addClass('none');
            actualQuestion++;
            $('.question.' + actualQuestion).removeClass('none');
            $('.percentage #plus').html(actualQuestion+1);
            $(this).addClass('hidden');
        });

        $(".quizz-share #replay").click(function(e){
            location.reload();
        });




        //var countQuestion = document.querySelector("#plus");
        //var count = 1;


        //$(".question .next").click(function(e){
        //    e.preventDefault();
        //    if (count <= 4){
        //        count += 1;
        //        countQuestion.innerHTML = count;
        //    } else if (count >= 5) {
        //        $(".question").addClass('none');
        //        $('.quizz-score').css({
        //            'display' : 'block'
        //        });
        //        $(".goal-tracker__data .percentage").addClass('none');
        ////        $(".goal-tracker__data #check").removeClass('none');
        //    }
    //
        // })

        // $(".quizz-share #replay").click(function(e){
        //    e.preventDefault();
        //    count = 1;
        //    countQuestion.innerHTML = count;
        //    $('.quizz-score').css({
        //        'display' : 'none'
        //    });
        //    $(".question").removeClass('none');
        //    $(".goal-tracker__data .percentage").removeClass('none');
        //    $(".goal-tracker__data #check").addClass('none');
        //});





    })
</script>

<?php include_once 'footer.php' ?>