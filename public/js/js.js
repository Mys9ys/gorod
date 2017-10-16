/**
 * Created by Мусяус on 22.08.2017.
 */
$(document).ready(function(){

    $('.calendar').click(function () {
        console.log('zm9k');
        mainAction();
    });
    $('.chel').mouseenter(function () {
        var $chelData = $('.chel').data();
        console.log('$chelData', $chelData);
        // var id = $chel.attr('data-id'),
        //     name = $chel.attr('data-name'),
        //     money = $chel.attr('data-money');
       console.log('id', $chelData.id, 'name: ', name, 'money: ', money);
    });

    var $map = $('.map');
    var mapW = $map.width();
    var mapH = $map.height();
    var mapPos = $map.offset();

    $('.chel').each(function () {
        var chelX = Math.floor(Math.random() * (mapW - $(this).width())) + mapPos.left;
        var chelY = Math.floor(Math.random() * (mapH - $(this).height())) + mapPos.top;
        console.log('name',$(this).data('name'),'chelX', chelX, 'chelH', chelY);
        $(this).offset({top:chelY,left:chelX})
    });
});

function calendar() {
    var count = $('.calendar').attr('data-countDay');
    count++;
    var day,month;
    if((day = count%6) == 0) {day = 6;}
    if((month = Math.ceil(count/6)%4) == 0) {month=4;}
    var year = Math.ceil(count/24);
    $('.calendar').attr('data-countDay', count);
    $('#day').text(day);
    $('#month').text(month);
    $('#year').text(year);
}

function eatFood() {
    
}

function mainAction() {
    calendar();
}