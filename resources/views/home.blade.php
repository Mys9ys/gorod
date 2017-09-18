@extends('layouts.app')

@section('content')
    <div class="body">1</div>

    <div class="map" style="width: 600px; height: 400px; background: rgb(225, 225, 225);">
        <div class="chel" data-id="1" data-name="AAA" data-money="10" style="width: 20px; height: 20px; border: 1px solid blue;"></div>
    </div>

    <div class="calendar" data-countDay="1">
        <div id="day">1</div>
        <div id="month">1</div>
        <div id="year">1</div>
        <div id="nextDay">>></div>
    </div>

@endsection
