window.onload = function(){

  $(window).resize(function(){
    if (window.innerWidth < 1000) {
      // $('.navbar-toggler').attr('aria-expanded','toggle');
      $('.navbar-nav').hide();
    }else {
      $('.navbar-nav').show();
    }
  })

  $('.navbar-toggler-icon').click(function(){
    $('.navbar-nav').toggle();
  })

}
