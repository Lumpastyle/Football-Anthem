jQuery(function(){

  // function pour lancer une animation
  // si on est en mode entrée, alors scroll = false
  // ca permet de changer de slide ensuite.
  $.fn.extend({
      animateCssAndScroll: function (animationName, scroll) {
          var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
          $(this).addClass('animated ' + animationName).one(animationEnd, function() {
            if(!scroll) {
              $(this).removeClass('animated ' + animationName);
              setTimeout(function(){isScrolling = scroll;}, 500);
            }
          });
      }
  });

  var isScrolling = false;
  var isFirst = false;
  var isLast = false;
  var toUp = false;

  var prevEl = $('.year-nav .prev');
  var nextEl = $('.year-nav .next');
  var actualEl = $('.year-nav .date');
  // animation au premier chargement.
  enterAnimations();

  // SI compétition courante est la première
  if(prevEl.hasClass('hidden')) {
    isFirst = true;
  }

  // SI compétition courante est la dernière
  if(nextEl.hasClass('hidden')) {
    isLast = true;
  }

  $('.more-infos').off('scroll').on('scroll', function(){ 
    isScrolling = true; 
    console.log(isScrolling);
  });


  $(window).bind('mousewheel', function(event) {
      if (event.originalEvent.wheelDelta > 0 && !isScrolling && !isFirst) {
          isScrolling = true;
          toUp = true;
          getPreviousSlide();
      }
      else if(event.originalEvent.wheelDelta < 0 && !isScrolling && !isLast){
          isScrolling = true;
          toUp = false;
          getNextSlide();
      }
  });

  prevEl.on('click', function(event) {
      event.preventDefault();
      isScrolling = true;
      toUp = true;
      getPreviousSlide();
  });

  nextEl.on('click', function(event) {
      event.preventDefault();
      isScrolling = true;
      toUp = false;
      getNextSlide();
  });

  function getPreviousSlide() {
    var prev = prevEl.data('prev-id');
    outAnimations();
    getCompetition(prev);
  }

  function getNextSlide() {
    var next = nextEl.data('next-id');
    outAnimations();
    getCompetition(next);

  }

  function getCompetition(id){
    var audio = document.getElementById('audio1');
    audio.pause();
    audio.currentTime = 0;
    $('#play-music-one').removeClass('none');
    $('#pause-music-one').addClass('none');

    var audio2 = document.getElementById('audio2');
    audio2.pause();
    audio2.currentTime = 0;
    $('#play-music-two').removeClass('none');
    $('#pause-music-two').addClass('none');

    $.ajax({
        url:"get_competition.php",
        type: 'GET',
        data: {'id': id},
        dataType: 'json',
        success:function(data) {

            
            // On met un timeout sur le changement des valeurs dans l'html , et on lance les animations d'entrées
            // permet de pas voir les changements immédiatement et ensuite les anims d'entrées.
            setTimeout(function(){

              compet = data[0];
              compet.c_date = new Date(compet.c_date).getFullYear();
              actualEl.html(compet.c_date);
              $('.music h3').html(compet.compe + ' - ' + compet.orga);
              $('.music h2').html(compet.c_hymne);
              $('#audio1').attr("src", "assets/musics/"+compet.c_audio+".mp3");
              $('.portraits').attr("href", "assets/images/portraits/"+compet.c_visuel+".png");
              $('.music-desc h4').html(compet.h_chanteur);
              $('.music-desc p').html(compet.h_desc);
              $('.logo-competition').attr("src","assets/images/competitions/"+compet.c_image+".png");

              $('.portraits').attr("src","assets/images/portraits/"+compet.c_visuel+".png");
              $('#winner').html(compet.c_gagnant);
              $('.finaliste').html(compet.c_finaliste);
              $('.semi1').html(compet.c_semi_1);
              $('.semi2').html(compet.c_semi_2);
              $('.know .description').html(compet.c_description);
              $('.winner-list .clip-circle').attr("src","assets/images/flags/"+compet.gagnant_flag+".png");
              var template = "";

              data.forEach(function(value, index) {
                template += '<img  class="clip-circle" src="assets/images/flags/'+value.participant_flag+'.png">'
              });

              $('.flags').html(template);
              
              if(compet.populaire != false) {
                $('.more-musics-btn').removeClass('none');
                $('.more-musics-title').html(compet.populaire.name);
                $('.more-musics-artist').html(compet.populaire.description);
                $('#audio2').attr('src', "assets/musics/"+compet.populaire.audio+".mp3")
              } else {
                $('.more-musics-btn').addClass('none');
              }

              if(compet.prev != null) {
                compet.prev.date = new Date(compet.prev.date).getFullYear();
                prevEl.removeClass('hidden');
                prevEl.find('.year').html(compet.prev.date);
                prevEl.data('prev-id', compet.prev.id);
                isFirst = false;
              } else {
                isFirst = true;
                prevEl.addClass('hidden');
              }

              if(compet.next != null) {
                compet.next.date = new Date(compet.next.date).getFullYear();
                nextEl.removeClass('hidden');
                nextEl.find('.year').html(compet.next.date);
                nextEl.data('next-id', compet.next.id);
                isLast = false;
              } else {
                isLast = true;
                nextEl.addClass('hidden');
              }

              enterAnimations();
            }, 500);
        }
    });
  }

  function isBottom() {
    var a = $(".portraits").offset().top;
    var b = $(".portraits").height();
    var c = $(window).height();
    var d = $(window).scrollTop();
    if ((c+d)>(a+b)) {
      //bottom of #mydiv has just become visible
      $(".portraits").addClass('bottom');
    }
  }

  function outAnimations() {
    // Met une durée d'animation différente en entrée
    $('.portraits').css({
      animationDuration: '.2s'
    })
    prevEl.find('.year').css({
      animationDuration: '.2s'
    })
    nextEl.find('.year').css({
      animationDuration: '.2s'
    })
    actualEl.css({
      animationDuration: '.2s'
    })

    // Donne en paramètre le type d'animation, et si on est en mode scrolling ou non. (pour éviter de changer de slide trop vite)
    $('.portraits').animateCssAndScroll('fadeOut', true);

    // Si on slide vers le haut ou vers le bas, animation différente de sortie
    if(toUp){
      prevEl.find('.year').animateCssAndScroll('fadeOutDown', true);
      nextEl.find('.year').animateCssAndScroll('fadeOutDown', true);
      actualEl.animateCssAndScroll('fadeOutDown', true);
    } else {
      prevEl.find('.year').animateCssAndScroll('fadeOutUp', true);
      nextEl.find('.year').animateCssAndScroll('fadeOutUp', true);
      actualEl.animateCssAndScroll('fadeOutUp', true);
    }
  }

  function enterAnimations() {




    // permet de supprimer les animations de 'OUT' si existantes
    if($('.portraits').hasClass('animated')) {
      $('.portraits').removeClass('fadeOut');



      if(toUp){
        prevEl.find('.year').removeClass('fadeOutDown');
        nextEl.find('.year').removeClass('fadeOutDown');
        actualEl.removeClass('fadeOutDown');
      } else {
        prevEl.find('.year').removeClass('fadeOutUp');
        nextEl.find('.year').removeClass('fadeOutUp');
        actualEl.removeClass('fadeOutUp');
      }

    }

    // Met une durée d'animation différente en entrée
    $('.portraits').css({
      animationDuration: '.7s'
    })

    $('.music h3').css({
      animationDuration: '4s'
    })

    $('.music-desc').css({
      animationDuration: '6s'
    })
    $('.more-btns').css({
      animationDuration: '6s'
    })
    $('.play-one').css({
      animationDuration: '6s'
    })


    $('.portraits').animateCssAndScroll('fadeInUp', false);

    $('.music h3').animateCssAndScroll('fadeIn', false);

    $('.music h2').animateCssAndScroll('fadeInUp', false);

    $('.music-desc').animateCssAndScroll('fadeIn', false);
    $('.more-btns').animateCssAndScroll('fadeIn', false);
    $('.play-one').animateCssAndScroll('fadeIn', false);
    

    // Si on slide vers le haut ou vers le bas, animation différente d'entrée
    if(toUp){
      prevEl.find('.year').animateCssAndScroll('fadeInDown', false);
      nextEl.find('.year').animateCssAndScroll('fadeInDown', false);
      actualEl.animateCssAndScroll('fadeInDown', false);
    } else {
      prevEl.find('.year').animateCssAndScroll('fadeInUp', false);
      nextEl.find('.year').animateCssAndScroll('fadeInUp', false);
      actualEl.animateCssAndScroll('fadeInUp', false);
    }

  }
})
