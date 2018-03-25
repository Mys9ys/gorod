<link href="{{ URL::asset('public/block/calendar/style.css') }}" rel="stylesheet" type="text/css" >
{{--<link rel="stylesheet" type="text/css" href="{{ asset('/block/calendar/style.css') }}" />--}}
<?$calendarInfo=\App\Calendar::all()->first()?>
<?//dd($calendarInfo->id)?>
<div class="calendar-block" data-count="<?=$calendarInfo->countDay?>" data-part="<?=$calendarInfo->partDay?>">
    <div class="calendar_left_button left">
        <div class="part-day">Y</div>
        <i class="fa fa-angle-double-right fa-3x next-day" aria-hidden="true"></i>
    </div>
    <div class="calendar_center left">
        <div class="calendar_title_block">
            <div class="title_day calendar_title left">d</div>
            <div class="title_month calendar_title left">m</div>
        </div>
        <div class="calendar_value_block">
            <div class="value_day calendar_value left"><?=calendarDay($calendarInfo->countDay)?></div>
            <div class="value_month calendar_value left"><?=calendarMonth($calendarInfo->countDay)?></div>
        </div>
    </div>
    <div class="calendar_year right"><?=calendarYear($calendarInfo->countDay)?></div>
</div>

<script src="{{ URL::asset('public/block/calendar/script.js') }}"></script>

<?
function calendarDay($count){
    if(($day = ceil($count%6))==0){
        $day=6;
    }
    return $day;
}
function calendarMonth($count){
    if(($month = ceil($count/6)%4) == 0){
        $month = 4;
    }
    return $month;
}
function calendarYear($count){
    return ceil($count/24);
}?>