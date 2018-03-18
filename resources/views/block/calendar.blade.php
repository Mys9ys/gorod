<link href="{{ URL::asset('public/block/calendar/style.css') }}" rel="stylesheet" type="text/css" >
{{--<link rel="stylesheet" type="text/css" href="{{ asset('/block/calendar/style.css') }}" />--}}

<div class="calendar" data-count="">
    <div class="calendar_left_button left">
        <i class="fa fa-angle-double-right fa-3x" aria-hidden="true"></i>
    </div>
    <div class="calendar_center left">
        <div class="calendar_title_block">
            <div class="title_day calendar_title left">d</div>
            <div class="title_month calendar_title left">m</div>
        </div>
        <div class="calendar_value_block">
            <div class="value_day calendar_value left">1</div>
            <div class="value_month calendar_value left">1</div>
        </div>
    </div>
    <div class="calendar_year right">001</div>
</div>

<script src="{{ URL::asset('public/block/calendar/script.js') }}"></script>