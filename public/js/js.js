/**
 * Created by Мусяус on 22.08.2017.
 */
$(document).ready(function(){

    $('.body').text();
    console.log('mi tyt');
    $('.calendar').click(function () {
        console.log('zm9k');
        mainAction();
    });
    $('.chel').hover(function () {
        var id = $('.chel').attr('data-id'),
            name = $('.chel').attr('data-name'),
            money = $('.chel').attr('data-money');
       console.log('id', id, 'name: ', name, 'money: ', money);
    });
    var height = $('.chel').offset();
    console.log('off',height);
    $('.chel').offset({top:150,left:100});
});

function calendar() {
    var count = $('.calendar').attr('data-countDay');
    count++;
    var day,month;
    if((day = count%6) == 0) {day = 6;}
    if((month = Math.ceil(count/6)%4) == 0) {month=4;}
    var year = Math.ceil(count/24);

    // console.log('count',count);
    // console.log('day',day);
    // console.log('year',year);
    // console.log('month',month);

    $('.calendar').attr('data-countDay', count);
    $('#day').text(day);
    $('#month').text(month);
    $('#year').text(year);
}
function mainAction() {
    calendar();
}