<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Gorod</title>

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/main.css') }}" rel="stylesheet">
    {{--<link href="{{ asset('public/block/header/style.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('public/js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('public/js/app.js') }}"></script>
    <script src="{{ asset('public/js/main.js') }}"></script>
    <script src="{{ asset('public/js/jquery.cookie.js') }}"></script>
</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <?require_once public_path().'/functions/fist_half_day.php';?>

            <?fist_half_day()?>

            <!-- Branding Image -->
            <div class="navbar-brand">
                <?if(isset($_COOKIE['CountryID'])){
                    $country = \App\Country::find($_COOKIE['CountryID']);?>
                    <img class="country_icon left" src="public/image/country_icon.jpg" alt="">
                    <div class="CountryID left" data="<?=$country->id;?>"><?=$country->name;?></div>
                    <?if(isset($_COOKIE['CityID'])){
                        $city = \App\City::find($_COOKIE['CityID']);?>
                        <i class="fa fa-angle-right left" aria-hidden="true"></i>
                        <img class="city_icon left" src="public/image/city_icon.jpg" alt="">
                        <div class="CityID left" data="<?=$city->id;?>"><?=$city->name;?></div>
                    <?}?>
                <?}?>
            </div>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                @include('block.calendar')
            </ul>
        </div>
    </div>
</nav>