/**
 * Created by Мусяус on 22.08.2017.
 */
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function(){

    $('.calendar').click(function () {
        console.log('zm9k');
        mainAction();
    });
    $('.chel').mouseenter(function () {
        var $chelData = $('.chel').data();
        // console.log('$chelData', $chelData);
        // var id = $chel.attr('data-id'),
        //     name = $chel.attr('data-name'),
        //     money = $chel.attr('data-money');
        // console.log('id', $chelData.id);
    });

    var $map = $('.map');
    var mapW = $map.width();
    var mapH = $map.height();
    var mapPos = $map.offset();

    $('.chel').each(function () {
        // var chelX = Math.floor(Math.random() * (mapW - $(this).width())) + mapPos.left;
        // var chelY = Math.floor(Math.random() * (mapH - $(this).height())) + mapPos.top;
        // console.log('name',$(this).data('name'),'chelX', chelX, 'chelH', chelY);
        // $(this).offset({top:chelY,left:chelX})
    });

    $('.reset').click(function () {
        $.post({
            url: '/reset',
            success: function(result){
                location.reload();
            }
        });
    });
    $('.addHuman').click(function () {
        addHuman(20);
    });
    // $('.searchButton')
    // end $(document).ready
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
    $.post({
        url: '/ajaxRequest',
        data: { count: count },
        success: function(result){
            console.log(result);
        }
    });




    // $.ajax({
    //     type: 'POST',
    //     url: '/ajaxRequest',
    //     data: { count: count },
    //     success: function(result){
    //         console.log(result);
    //     }
    // });
}

function buyFood() {

}

function eatFood() {

}

function mainAction() {
    calendar();
}

function addHuman(count) {
    // console.log('dobavit', count, '4elov' );
    $.post('/addHuman',{
        count: count
    }, function (data) {
        console.log('vjvo', data);
    }, "json");
}