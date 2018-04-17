$(document).ready(function () {
   $('.calendar_left_button').hover(function () {
       $(this).find('.time-of-day').toggle();
       $(this).find('.next-day').toggle();
   });
   $('.next-day').click(function () {
       calendar();
       partDays();
   });

});

function calendar() {
    var part = $('.calendar-block').attr('data-part');
    var count = $('.calendar-block').attr('data-count');
    var arPart = ['Y','D','N'];
    part++;
    if(part==4){
        part=1; count++;
    }
    $('.calendar-block').attr('data-part', part);
    $('.part-day').text(arPart[part-1]);
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
        }
    );
}