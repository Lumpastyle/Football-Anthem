jQuery(function(){

    // permet d'éviter le scroll sur la page
    $('body').css('overflow','hidden');
    $('html').css('overflow','hidden');

    $("#more-infos").click(function(e){
        e.preventDefault();
        $('#div-more-infos').removeClass('hidden');
        $('#div-more-infos').addClass('visible');
        $('body').css({
            'overflow' : 'hidden'
        });
        $('#filtre_anim').show().css({
            backgroundColor : '#07152E'
        });
    });

    $("#more-musics").click(function(e){
        e.preventDefault();
        $('#div-more-musics').removeClass('hidden');
        $('#div-more-musics').addClass('visible');
        $('body').css({
            'overflow' : 'hidden'
        });
        $('#filtre_anim').show().css({
            backgroundColor : '#07152E'
        });
    });

    $(".more-infos .cross").click(function(e){
        e.preventDefault();
        $('.more-infos').addClass('hidden');
        $('.more-musics').addClass('hidden');
        $('.more-infos').removeClass('visible');
        $('#filtre_anim').hide();
    });

    $(".music .calltoaction").on('mouseover', function(e){
        e.preventDefault();
        $('.music #yellow').addClass('none');
        $('.music #blue').removeClass('none');
    });

    $(".music .calltoaction").on('mouseout', function(e){
        e.preventDefault();
        $('.music #yellow').removeClass('none');
        $('.music #blue').addClass('none');
    });

    $("#div-more-musics .calltoaction").on('mouseover', function(e){
        e.preventDefault();
        $('#div-more-musics #yellow').addClass('none');
        $('#div-more-musics #blue').removeClass('none');
    });

    $("#div-more-musics .calltoaction").on('mouseout', function(e){
        e.preventDefault();
        $('#div-more-musics #yellow').removeClass('none');
        $('#div-more-musics #blue').addClass('none');
    });

    $(".music .play-one").click(function(e){
        e.preventDefault();
        var audio = document.getElementById('audio1');
        if (audio.paused) {
            $('#pause-music-one').removeClass('none');
            $('#play-music-one').addClass('none');
            audio.play();
        }else{
            $('#play-music-one').removeClass('none');
            $('#pause-music-one').addClass('none');
            audio.pause();
        }
    });

    $(".more-musics .play-two").click(function(e){
        e.preventDefault();
        var audio = document.getElementById('audio2');
        if (audio.paused) {
            $('#pause-music-two').removeClass('none');
            $('#play-music-two').addClass('none');
            audio.play();
        }else{
            $('#play-music-two').removeClass('none');
            $('#pause-music-two').addClass('none');
            audio.pause();
        }

        $(".more-musics .cross").click(function(e){
            e.preventDefault();
            $('.more-infos').addClass('hidden');
            $('.more-musics').addClass('hidden');
            $('.more-musics').removeClass('visible');
            $(".more-musics .play-two").click();
            $('#filtre_anim').hide();
            audio.pause();
            audio.currentTime = 0;
            $('#pause-music-one').removeClass('none');
            $('#play-music-one').addClass('none');
        });
    });

    //   $("#div-more-musics #play-music").click(function(e){
    //   	e.preventDefault();
    //       var audio = document.getElementById('audio2');
    // if (audio.paused) {
    //     audio.play();
    // }else{
    //     audio.pause();
    // }
    //   });

    $("header #burger").click(function(e){
        e.preventDefault();
        $('#div-burger').removeClass('none');
        $('header #burger').addClass('hidden');

        $('.year-nav').addClass('none');
        $('.competitions').addClass('none');
        $('header').addClass('none');
    });

    $("#div-burger .cross").click(function(e){
        e.preventDefault();
        $('#div-burger').addClass('none');
        $('header #burger').removeClass('hidden');

        $('.year-nav').removeClass('none');
        $('.competitions').removeClass('none');
        $('header').removeClass('none');
    });



})
