(function($){
  $(function(){
    $('.sidenav').sidenav();
    $('.parallax').parallax();
    $('select').formSelect();
    $('input#input_text, textarea#textarea2').characterCounter();
  }); // end of document ready
})(jQuery); // end of jQuery name space