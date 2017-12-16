$(document).ready(function(){
  $('.jquery-spoiler .invisible').hide();
  $('.jquery-spoiler a').toggle(
    function(){
      $(this).siblings('.invisible').stop(false, true).slideDown(400);
      $(this).html('Редактирование');
    },
   function(){
      $(this).siblings('.invisible').stop(false, true).slideUp(400);
      $(this).html('Редактировать данные аккаунта');
   }
 );
});