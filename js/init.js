(function($){
  $(function(){
    $('.sidenav').sidenav();
    $('.parallax').parallax();
    $('select').formSelect();
     $('.slider').slider();
    $('input#input_text, textarea#textarea2').characterCounter();
    scroller.init();
  }); // end of document ready
})(jQuery); // end of jQuery name space