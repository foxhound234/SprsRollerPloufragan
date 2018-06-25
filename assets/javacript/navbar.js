$(document).ready(function() {
  var NavTop = $('.navbar').offset().top;
  var Nav = function() {
    var scrollTop = $(window).scrollTop();
    if (scrollTop > NavTop) { 
      $('.navbar').addClass('sticky');
    } else {
      $('.navbar').removeClass('sticky'); 
    }
  };

  navbar();

  $(window).scroll(function() {
    navbar();
  });
});