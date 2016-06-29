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
<header id="header-dates">
    <a id="burger" class="none" href=""><img src="assets/images/burger.svg"></a>
    <h1 class="logo"><a href="index.php?p=timeline"><img id="logo" src="assets/images/logo.png"></a></h1>
    <nav class="main-nav">
        <ul>
            <li><a href="index.php?p=pays">Nations</a></li>
            <li><a class="active" href="index.php?p=dates">Compétitions</a></li>
            <li><a href="index.php?p=quizz">Quizz</a></li>
        </ul>
    </nav>
</header>
<div class="legends">
    <div class="legend">
        <div class="circle-blue"></div>
        <p>Championnat d'Europe</p>
    </div>
    <div class="legend">
        <div class="circle-yellow"></div>
        <p>Coupe du Monde</p>
    </div>
</div>
<hr id="legends-hr">
<div class="competitions-years">
    <ul>
        <li><a class="blue" href="">2016</a></li>
        <li><a class="yellow" href="">2014</a></li>
        <li><a class="blue" href="">2016</a></li>
        <li><a class="yellow" href="">2014</a></li>
        <li><a class="blue" href="">2016</a></li>
        <li><a class="yellow" href="">2014</a></li>
        <li><a class="blue" href="">2016</a></li>
        <li><a class="yellow" href="">2014</a></li>
        <li><a class="blue" href="">2016</a></li>
        <li><a class="yellow" href="">2014</a></li>
        <li><a class="blue" href="">2016</a></li>
        <li><a class="yellow" href="">2014</a></li>
        <li><a class="blue" href="">2016</a></li>
        <li><a class="yellow" href="">2014</a></li>
        <li><a class="blue" href="">2016</a></li>
        <li><a class="yellow" href="">2014</a></li>
        <li><a class="blue" href="">2016</a></li>
        <li><a class="yellow" href="">2014</a></li>
        <li><a class="blue" href="">2016</a></li>
        <li><a class="yellow" href="">2014</a></li>
        <li><a class="blue" href="">2016</a></li>
        <li><a class="yellow" href="">2014</a></li>
        <li><a class="blue" href="">2016</a></li>
        <li><a class="yellow" href="">2014</a></li>
        <li><a class="blue" href="">2016</a></li>
        <li><a class="yellow" href="">2014</a></li>
        <li><a class="blue" href="">2016</a></li>
        <li><a class="yellow" href="">2014</a></li>
        <li><a class="blue" href="">2016</a></li>
        <li><a class="yellow" href="">2014</a></li>
        <li><a class="blue" href="">2016</a></li>
        <li><a class="yellow" href="">2014</a></li>
        <li><a class="blue" href="">2016</a></li>
        <li><a class="yellow" href="">2014</a></li>
        <li><a class="blue" href="">2016</a></li>
        <li><a class="yellow" href="">2014</a></li>
        <li><a class="blue" href="">2016</a></li>
        <li><a class="yellow" href="">2014</a></li>
        <li><a class="blue" href="">2016</a></li>
        <li><a class="yellow" href="">2014</a></li>
        <li><a class="blue" href="">2016</a></li>
        <li><a class="yellow" href="">2014</a></li>
        <li><a class="blue" href="">2016</a></li>
        <li><a class="yellow" href="">2014</a></li>
        <li><a class="blue" href="">2016</a></li>
        <li><a class="yellow" href="">2014</a></li>
        <li><a class="blue" href="">2016</a></li>
        <li><a class="yellow" href="">2014</a></li>
    </ul>
</div>

<script>

    jQuery(function(){

        $("header #burger").click(function(e){
            e.preventDefault();
            $('#div-burger').removeClass('none');
            $('header #burger').addClass('hidden');

            $('.legends').css({
                'display' : 'none'
            });

            $('#header-dates').addClass('none');
            $('.competitions-years').addClass('none');
        });

        $("#div-burger .cross").click(function(e){
            e.preventDefault();
            $('#div-burger').addClass('none');
            $('header #burger').removeClass('hidden');

            $('.legends').css({
                'display' : 'block'
            });

            $('#header-dates').removeClass('none');
            $('.competitions-years').removeClass('none');
        });
    })
</script>

<?php include_once 'footer.php' ?>