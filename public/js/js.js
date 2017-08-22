/**
 * Created by Мусяус on 22.08.2017.
 */
$(document).ready(function(){
  $('body').append('<div class="calendar" style="width: 50px; height: 25px; border: 1px solid green;"></div>');
    $('.body').text();
    console.log('mi tyt');
    $('.calendar').click(function () {
        console.log('zm9k');

        $('.body').text();
    });
});