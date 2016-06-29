<?php
$title = "Football-Anthem - Redécouvrez les hymnes du football";
include_once 'header.php' ?>

<div class="middle">
    <h1><img id="logo" src="assets/images/logo.png"></h1>
    <h2>Tout match commence par un hymne</h2>
    <div id="div-headphones">
        <img id="headphones" src="assets/images/son.svg">
        <p>Allumez le son pour une meilleure expérience</p>
    </div>
    <div class="hidden" id="div-commencer">
        <a class="calltoaction" href="index.php?p=timeline">Commencer</a>
    </div>
</div>

<script>

    $(document).ready(function(){

        $.fn.extend({
            animateCss: function (animationName) {
                var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
                $(this).addClass('animated ' + animationName).one(animationEnd, function() {
                    $(this).removeClass('animated ' + animationName);
                });
            }
        });

        $('#logo').animateCss('fadeIn');
        $('h2').animateCss('fadeInUp');
        $('#div-headphones').animateCss('fadeIn');
        $('#headphones').animateCss('pulse');
        $('#div-commencer').animateCss('flipInX');


        setTimeout(nextButton, 6500);

        function nextButton(){
            $('#div-headphones').addClass('hidden');
            $('#div-commencer').removeClass('hidden');
        }
    });

</script>

<?php include_once 'footer.php' ?>