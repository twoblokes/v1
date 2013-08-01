var Tb = {};

Tb.navBar = function() {
  var top = $(window).scrollTop();
  if( top > 230 ){   
    $('#secondary-header').stop(true).animate({
      'top' : '0'
    }, 300);
  }
  else{
    $('#secondary-header').stop(true).animate({
      'top' : '-75px'
    }, 50);
  }
}

Tb.toWork = function() {
  var nextSection = $('.next-section');
  var secondSection = $('.second');

  nextSection.on('click', function(){
    $('html, body').animate({ scrollTop: secondSection.offset().top }, 500);
  });
}

Tb.work = function() {
  Project = $('.project');

  Project.click(function(){
    $('.close-all-work').fadeIn();
    $(this).each(function(){
      var That        = $(this),
          Gradient    = That.find('.gradient');
          Overlay     = That.find('.overlay');
      if (That.hasClass('open')) {
        event.preventDefault();
        That.animate({
          'height': '150px'
        }, 100, function(){ That.attr( "style", "" ) }).toggleClass('open');
        That.find('.screenshot').css('top', 150).addClass('hover').attr( "style", "" );
        Gradient.fadeIn();
        Overlay.fadeOut();
      }
      else {
        event.preventDefault();
        That.animate({
          'height': '600px'
        }, 100).toggleClass('open');
        That.find('.screenshot').css('top', 40).removeClass('hover');
        Gradient.fadeOut();
        Overlay.fadeIn();
      }
    });
  });
}

Tb.closeAllWork = function() {
  var Project       = $('.project'),
      closeButton   = $('.close-all-work')
      Gradient      = Project.find('.gradient')

  closeButton.on('click', function(){
    if (Project.hasClass('open')) {
      Project.animate({
          'height': '150px'
      }, 100, function(){ Project.attr( "style", "" ) }).toggleClass('open');
      Project.find('.screenshot').css('top', 150).addClass('hover').attr( "style", "" );
      Gradient.fadeIn();
      closeButton.fadeOut();
    }
  });
}


$(function(){
  Tb.toWork();
  Tb.work();
  Tb.closeAllWork();
})

$(window).scroll(function () {
  Tb.navBar();
});