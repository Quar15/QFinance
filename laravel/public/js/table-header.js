  // variables
  var topPosition = $('#floating-header').offset().top - 10;
  var floatingDivHeight = $('#floating-header').outerHeight();
  var footerFromTop = $('footer').offset().top;
  var absPosition = footerFromTop - floatingDivHeight - 20;
  var win = $(window);
  var floatingDiv = $('#floating-header');

win.scroll(function() {
 if (window.matchMedia('(min-width: 768px)').matches) {
  if ((win.scrollTop() > topPosition) && (win.scrollTop() < absPosition)) {
   floatingDiv.addClass('sticky');
  } else {
   floatingDiv.removeClass('sticky');
  }
 }
});