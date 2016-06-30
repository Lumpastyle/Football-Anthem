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

  function getPreviousSlide() {
    console.log('GOT PREVIOUS SLIDE');
    var prev = prevEl.data('prev-id');
    outAnimations();
    getCompetition(prev);
  }

  function getNextSlide() {
    console.log('GOT NEXT SLIDE');
    var next = nextEl.data('next-id');
    outAnimations();
    getCompetition(next);

  }

  function getCompetition(id){
    $.ajax({
        url:"get_competition.php",
        type: 'GET',
        data: {'id': id},
        dataType: 'json',
        success:function(compet) {
            // On met un timeout sur le changement des valeurs dans l'html , et on lance les animations d'entrées
            // permet de pas voir les changements immédiatement et ensuite les anims d'entrées.
            setTimeout(function(){

              compet.date = new Date(compet.date).getFullYear();
              actualEl.html(compet.date);
              $('.music h3').html(compet.name + ' - ' + compet.id_organisateur);

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
