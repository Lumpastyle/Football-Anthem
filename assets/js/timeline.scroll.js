jQuery(function(){

  var isScrolling = false;
  var isFirst = false;
  var isLast = false;
  var prevEl = $('.year-nav .prev');
  var nextEl = $('.year-nav .next');
  var actualEl = $('.year-nav .date');

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
          getPreviousSlide();
      }
      else if(event.originalEvent.wheelDelta < 0 && !isScrolling && !isLast){
          isScrolling = true;
          getNextSlide();
      }
  });

  function getPreviousSlide() {
    console.log('GOT PREVIOUS SLIDE');
    var prev = prevEl.data('prev-id');
    getCompetition(prev);
  }

  function getNextSlide() {
    console.log('GOT NEXT SLIDE');
    var next = nextEl.data('next-id');
    getCompetition(next);

  }

  function getCompetition(id){
    $.ajax({
        url:"get_competition.php",
        type: 'GET',
        data: {'id': id},
        dataType: 'json',
        success:function(compet) {
            compet = compet[0];
            compet.c_date = new Date(compet.c_date).getFullYear();
            actualEl.html(compet.c_date);
            $('.music h3').html(compet.compe + ' - ' + compet.orga);
            $('.music h2').html(compet.c_hymne);
            $('#audio1').attr("href", "assets/musics/"+compet.c_audio+".mp3");
            $('.portraits').attr("href", "assets/images/portraits/"+compet.c_visuel+".png");
            $('.music-desc h4').html(compet.h_chanteur);
            $('.music-desc p').html(compet.h_desc);
            $('logo-competition').attr("href","assets/images/competitions/"+compet.c_image+".png");
            $('#winner').html(compet.c_gagnant);

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

            console.log('LAST?', isLast);
            console.log('FIRST?', isFirst);

            setTimeout(function(){isScrolling = false;}, 1000);

        }
    });
  }
})
