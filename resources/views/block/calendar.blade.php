<link href="{{ URL::asset('public/block/calendar/style.css') }}" rel="stylesheet" type="text/css" >
{{--<link rel="stylesheet" type="text/css" href="{{ asset('/block/calendar/style.css') }}" />--}}
<i class="fa fa-calendar-o" aria-hidden="true">1</i>

<div class="calendar" data-count="">
    <div class="calendar_left_button left">
        <i class="fa fa-angle-double-right fa-3x" aria-hidden="true"></i>
    </div>
    <div class="calendar_center">
        <div class="calendar_title">
            <div class="title_day"><i class="fa fa-calendar-o" aria-hidden="true"></i></div>
            <div class="title_month"><i class="fa fa-calendar" aria-hidden="true"></i></div>
        </div>
        <div class="calendar_value">
            <div class="value_day">1</div>
            <div class="value_month">1</div>
        </div>
        <div class="value_year">1</div>
    </div>

</div>


<script src="{{ URL::asset('public/block/calendar/script.js') }}"></script>