$(document).ready(function () {
   $('.calendar_left_button').hover(function () {
       $(this).find('.time-of-day').toggle();
       $(this).find('.next-day').toggle();
   });
   $('.next-day').click(function () {

       var part = $('.calendar-block').data('part');
       // console.log('part', part);
       calendar();
   });

});

function calendar() {
    var part = $('.calendar-block').attr('data-part');
    var count = $('.calendar-block').attr('data-count');
    var arPart = ['Y','D','N'];
    console.log('part', part, 'count', count);
    part++;
    if(part==4){
        part=1; count++;
    }
    $('.calendar-block').attr('data-part', part);
    $('.part-day').text(arPart[part-1]);
    console.log('part', part, 'count', count);
    // count++;
    var day,month;
    if((day = count%6) == 0) {day = 6;}
    if((month = Math.ceil(count/6)%4) == 0) {month=4;}
    var year = Math.ceil(count/24);
    $('.calendar-block').attr('data-count', count);
    $('.value_day').text(day);
    $('.value_month').text(month);
    $('.calendar_year').text(year);
    var data = {
        partDay:part,
        countDay:count
    };
    $.post(
       '/ajaxCalendar',
        data,
        function(result){
            console.log(result);
        }
    );
}