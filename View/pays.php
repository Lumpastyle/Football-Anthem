<?php
$title = "Football-Anthem - Redécouvrez les hymnes du football";
include_once 'header.php' ?>

<script>
    jQuery.noConflict();
    jQuery(function(){
        var $ = jQuery;

        $('#focus-single').click(function(){
            $('#map1').vectorMap('set', 'focus', {region: 'AU', animate: true});
        });
        $('#focus-multiple').click(function(){
            $('#map1').vectorMap('set', 'focus', {regions: ['AU', 'JP'], animate: true});
        });
        $('#focus-coords').click(function(){
            $('#map1').vectorMap('set', 'focus', {scale: 7, lat: 35, lng: 33, animate: true});
        });
        $('#focus-init').click(function(){
            $('#map1').vectorMap('set', 'focus', {scale: 1, x: 0.5, y: 0.5, animate: true});
        });
        $('#map1').vectorMap({
            map: 'world_mill_en',
            panOnDrag: true,
            focusOn: {
                x: 0.5,
                y: 0.5,
                scale: 1,
                animate: true
            },
            onRegionClick: function(e, code){
                getNameFromCode(code);
            },
            series: {
                regions: [{
                    scale: ['#FAFDFF', '#FFFFFF'],
                    normalizeFunction: 'polynomial',
                    values: {
                        "AF": 16.63,
                        "AL": 11.58,
                        "DZ": 158.97,
                        "AO": 85.81,
                        "AG": 1.1,
                        "AR": 351.02,
                        "AM": 8.83,
                        "AU": 1219.72,
                        "AT": 366.26,
                        "AZ": 52.17,
                        "BS": 7.54,
                        "BH": 21.73,
                        "BD": 105.4,
                        "BB": 3.96,
                        "BY": 52.89,
                        "BE": 461.33,
                        "BZ": 1.43,
                        "BJ": 6.49,
                        "BT": 1.4,
                        "BO": 19.18,
                        "BA": 16.2,
                        "BW": 12.5,
                        "BR": 2023.53,
                        "BN": 11.96,
                        "BG": 44.84,
                        "BF": 8.67,
                        "BI": 1.47,
                        "KH": 11.36,
                        "CM": 21.88,
                        "CA": 1563.66,
                        "CV": 1.57,
                        "CF": 2.11,
                        "TD": 7.59,
                        "CL": 199.18,
                        "CN": 5745.13,
                        "CO": 283.11,
                        "KM": 0.56,
                        "CD": 12.6,
                        "CG": 11.88,
                        "CR": 35.02,
                        "CI": 22.38,
                        "HR": 59.92,
                        "CY": 22.75,
                        "CZ": 195.23,
                        "DK": 304.56,
                        "DJ": 1.14,
                        "DM": 0.38,
                        "DO": 50.87,
                        "EC": 61.49,
                        "EG": 216.83,
                        "SV": 21.8,
                        "GQ": 14.55,
                        "ER": 2.25,
                        "EE": 19.22,
                        "ET": 30.94,
                        "FJ": 3.15,
                        "FI": 231.98,
                        "FR": 2555.44,
                        "GA": 12.56,
                        "GM": 1.04,
                        "GE": 11.23,
                        "DE": 3305.9,
                        "GH": 18.06,
                        "GR": 305.01,
                        "GD": 0.65,
                        "GT": 40.77,
                        "GN": 4.34,
                        "GW": 0.83,
                        "GY": 2.2,
                        "HT": 6.5,
                        "HN": 15.34,
                        "HK": 226.49,
                        "HU": 132.28,
                        "IS": 12.77,
                        "IN": 1430.02,
                        "ID": 695.06,
                        "IR": 337.9,
                        "IQ": 84.14,
                        "IE": 204.14,
                        "IL": 201.25,
                        "IT": 2036.69,
                        "JM": 13.74,
                        "JP": 5390.9,
                        "JO": 27.13,
                        "KZ": 129.76,
                        "KE": 32.42,
                        "KI": 0.15,
                        "KR": 986.26,
                        "KW": 117.32,
                        "KG": 4.44,
                        "LA": 6.34,
                        "LV": 23.39,
                        "LB": 39.15,
                        "LS": 1.8,
                        "LR": 0.98,
                        "LY": 77.91,
                        "LT": 35.73,
                        "LU": 52.43,
                        "MK": 9.58,
                        "MG": 8.33,
                        "MW": 5.04,
                        "MY": 218.95,
                        "MV": 1.43,
                        "ML": 9.08,
                        "MT": 7.8,
                        "MR": 3.49,
                        "MU": 9.43,
                        "MX": 1004.04,
                        "MD": 5.36,
                        "MN": 5.81,
                        "ME": 3.88,
                        "MA": 91.7,
                        "MZ": 10.21,
                        "MM": 35.65,
                        "NA": 11.45,
                        "NP": 15.11,
                        "NL": 770.31,
                        "NZ": 138,
                        "NI": 6.38,
                        "NE": 5.6,
                        "NG": 206.66,
                        "NO": 413.51,
                        "OM": 53.78,
                        "PK": 174.79,
                        "PA": 27.2,
                        "PG": 8.81,
                        "PY": 17.17,
                        "PE": 153.55,
                        "PH": 189.06,
                        "PL": 438.88,
                        "PT": 223.7,
                        "QA": 126.52,
                        "RO": 158.39,
                        "RU": 1476.91,
                        "RW": 5.69,
                        "WS": 0.55,
                        "ST": 0.19,
                        "SA": 434.44,
                        "SN": 12.66,
                        "RS": 38.92,
                        "SC": 0.92,
                        "SL": 1.9,
                        "SG": 217.38,
                        "SK": 86.26,
                        "SI": 46.44,
                        "SB": 0.67,
                        "ZA": 354.41,
                        "ES": 1374.78,
                        "LK": 48.24,
                        "KN": 0.56,
                        "LC": 1,
                        "VC": 0.58,
                        "SD": 65.93,
                        "SR": 3.3,
                        "SZ": 3.17,
                        "SE": 444.59,
                        "CH": 522.44,
                        "SY": 59.63,
                        "TW": 426.98,
                        "TJ": 5.58,
                        "TZ": 22.43,
                        "TH": 312.61,
                        "TL": 0.62,
                        "TG": 3.07,
                        "TO": 0.3,
                        "TT": 21.2,
                        "TN": 43.86,
                        "TR": 729.05,
                        "TM": 0,
                        "UG": 17.12,
                        "UA": 136.56,
                        "AE": 239.65,
                        "GB": 2258.57,
                        "US": 14624.18,
                        "UY": 40.71,
                        "UZ": 37.72,
                        "VU": 0.72,
                        "VE": 285.21,
                        "VN": 101.99,
                        "YE": 30.02,
                        "ZM": 15.69,
                        "ZW": 5.57
                    }
                }]
            }
        });


        $(".cross").click(function(e){
            e.preventDefault();
            $('.map-popup').addClass('hidden');
        });

        $(".map-popup .map-play-play").click(function(e){
            e.preventDefault();
            var audio = document.getElementById('audio1');
            if (audio.paused) {
                audio.play();
            }else{
                audio.pause();
                audio.currentTime = 0
            }
        });

        $("header #burger").click(function(e){
            e.preventDefault();
            $('#div-burger').removeClass('none');
            $('header #burger').addClass('hidden');

            $('#list-pays').addClass('none');
            $('#header-map').addClass('none');
            $('.map-popup').addClass('none');
        });

        $("#div-burger .cross").click(function(e){
            e.preventDefault();
            $('#div-burger').addClass('none');
            $('header #burger').removeClass('hidden');

            $('#list-pays').removeClass('none');
            $('#header-map').removeClass('none');
            $('.map-popup').removeClass('none');
        });

        $("#list-pays a").click(function(e){
            e.preventDefault();
            $('.map-popup').removeClass('none');
            $('#list-pays').css({
                'display' : 'none'
            });
        });

        $(".map-popup .cross").click(function(e){
            e.preventDefault();
            $('.map-popup').addClass('none');
            $('#list-pays').css({
                'display' : 'block'
            });
        });



        function openPopin(pays) {
            $.ajax({
                url:"get_data.php",
                type: 'GET',
                data: {pays: pays},
                dataType: 'json',
                success:function(data) {
                    console.log(data);
                    if(data.type == 'success') {
                        $('.map-popup').removeClass('none');
                        var country = data.pays;
                        $('.map-popup h2').html(country.name);
                    } else if(data.type == 'error') {
                        $('.map-popup').addClass('none');
                    }
                }
            });
        }

        function getNameFromCode(code) {
            $.getJSON( "js/lib/code_pays.json", function( data ) {
                $.each( data, function( key, pays ) {
                    if(code == pays.iso1) {
                        openPopin(pays.pays_fr);
                    }
                });
            });
        }
    })


</script>

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
<header id="header-map">
    <a id="burger" class="none" href=""><img src="assets/images/burger.svg"></a>
    <h1 class="logo"><a href="index.php?p=timeline"><img id="logo" src="assets/images/logo.png"></a></h1>
    <nav class="main-nav">
        <ul>
            <li><a class="active" href="index.php?p=pays">Nations</a></li>
            <li><a href="index.php?p=dates">Compétitions</a></li>
            <li><a href="index.php?p=quizz">Quizz</a></li>
        </ul>
    </nav>
</header>
<div id="list-pays">
    <ul>
        <li><a href=""><img class="clip-circle" src="assets/images/flags/allemagne.png"> <span>Allemagne</span></a></li>
        <li><a href=""><img class="clip-circle" src="assets/images/flags/allemagne.png"> <span>Allemagne</span></a></li>
        <li><a href=""><img class="clip-circle" src="assets/images/flags/allemagne.png"> <span>Allemagne</span></a></li>
        <li><a href=""><img class="clip-circle" src="assets/images/flags/allemagne.png"> <span>Allemagne</span></a></li>
        <li><a href=""><img class="clip-circle" src="assets/images/flags/allemagne.png"> <span>Allemagne</span></a></li>
        <li><a href=""><img class="clip-circle" src="assets/images/flags/allemagne.png"> <span>Allemagne</span></a></li>
        <li><a href=""><img class="clip-circle" src="assets/images/flags/allemagne.png"> <span>Allemagne</span></a></li>
        <li><a href=""><img class="clip-circle" src="assets/images/flags/allemagne.png"> <span>Allemagne</span></a></li>
        <li><a href=""><img class="clip-circle" src="assets/images/flags/allemagne.png"> <span>Allemagne</span></a></li>
        <li><a href=""><img class="clip-circle" src="assets/images/flags/allemagne.png"> <span>Allemagne</span></a></li>
    </ul>
</div>


<div class="map-popup none">
    <a class="cross" href=""><img src="assets/images/cross.svg"></a>
    <img  class="clip-circle" src="assets/images/flags/france.png">
    <h2>France</h2>
    <h3>La Marseillaise</h3>
    <div class="map-play">
        <audio id="audio1" src="assets/musics/Queen.mp3" type="audio/mp3"></audio>
        <a class="map-play-play" href=""><img src="assets/images/triangleblue.svg"></a>
        <p class="map-play-artist">Rouget de Lisle  -  1975</p>
    </div>
    <p class="map-popup-desc">Ego vero sic intellego, Patres conscripti, nos hoc tempore in provinciis decernendis perpetuae pacis habere oportere rationem. Nam quis hoc non sentit omnia alia esse nobis vacua ab omni periculo atque etiam suspicione belli?</p>
    <span class="span">Particpations</span>
    <hr>
    <div class="map-popup-participations">
        <div class=" map-popup-one">
            <img src="assets/images/world.svg">
            <span>12</span>
        </div>
        <div class=" map-popup-one">
            <img src="assets/images/europe.svg">
            <span>15</span>
        </div>
        <div class=" map-popup-one">
            <img src="assets/images/award.svg">
            <span>3</span>
        </div>
    </div>
    <a class="quizz-share-btn fb" href=""><img src="assets/images/fb.svg"> partager</a>
</div>

<!-- <div style="height: 400px"></div> -->
<div id="map1" style="width: 100%; height: 100vh"></div>


<?php include_once 'footer.php' ?>
