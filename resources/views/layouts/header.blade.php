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

            <!--            --><?//require_once public_path().'/functions/fist_half_day.php';?>

        <!--            --><?//fist_half_day()?>

        <!--            --><?//dd($_COOKIE['CountryID'])?>
        <!-- Branding Image -->
            <div class="navbar-brand">
                <img class="country_icon left" src="public/image/country_icon.jpg" alt="">
<!--                --><?//dd('mi tyt')?>
                <?if(isset($_COOKIE['CountryID'])){
                    $country = \App\Country::find($_COOKIE['CountryID']);?>
                    <div class="CountryID left" data="<?=$country->id;?>"><?=$country->name;?></div>
                        <i class="fa fa-angle-right left" aria-hidden="true"></i>
                        <img class="city_icon left" src="public/image/city_icon.jpg" alt="">
                        <?if(isset($_COOKIE['CityID'])){
                        $city = \App\City::find($_COOKIE['CityID']);?>
                        <div class="CityCheck CityID left" data-country="<?=$country->id;?>" data-id="<?=$city->id;?>"><?=$city->name;?></div>
                    <?}else{?>
                        <div class="CityCheck left CityID" data-country="<?=$country->id;?>">Выбрать</div>
                    <?}?>
                        <div class="CitySelect HeaderSelectBox"></div>
                <?} else {?>
                    <div class="CountryID left">Выбрать</div>
                <? }?>
                <?$country = \App\Country::pluck('id', 'name');?>
                <div class="CountrySelect HeaderSelectBox">
                    <?foreach($country as $name=>$id){?>
                    <div class="CountrySelectItem HeaderSelectItem" data-id="<?=$id;?>"><?=$name;?></div>
                    <?}?>
                </div>


            </div>
        </div>


        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;<li class="nav-item ">
                    <a class="nav-link menu_btn" href="javascript:void(0)">Menu</a>
                </li>

            </ul>


            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                @include('block.calendar')
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="menu_container">
        <?$tabNumber=1;?>
        <ul class="nav nav-tabs">
            <li><a data-toggle="tab" href="#panel<?=$tabNumber++;?>">Меню</a></li>
            <li class="active"><a data-toggle="tab" href="#panel<?=$tabNumber++;?>">Государство</a></li>
            <li><a data-toggle="tab" href="#panel<?=$tabNumber++;?>">Население</a></li>
            <li><a data-toggle="tab" href="#panel<?=$tabNumber++;?>">Компании</a></li>
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    Другие панели
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a data-toggle="tab" href="#panel<?=$tabNumber++;?>">Панель <?=$tabNumber?></a></li>
                    <li><a data-toggle="tab" href="#panel<?=$tabNumber++;?>">Панель <?=$tabNumber?></a></li>
                </ul>
            </li>
        </ul>
        <?$panelNumber = 1;?>
        <div class="tab-content">
            <div id="panel<?=$panelNumber++;?>" class="tab-pane fade">
                <h3>Меню</h3>
                <div class="gameMenuButton">
                    <button class="startGame">Начать игру</button>
                    <a href="/setting">
                        <button class="gameSettings">Настройки</button>
                    </a>
                    <button class="addHuman">Добавить человечков</button>
                    <button class="reset">Reset</button>
                </div>
            </div>
            <div id="panel<?=$panelNumber++;?>" class="tab-pane fade ">
                @include('block.country')
            </div>
            <div id="panel<?=$panelNumber++;?>" class="tab-pane fade">
                <h3>Население</h3>
                @include('block.human')
            </div>
            <div id="panel<?=$panelNumber++;?>" class="tab-pane fade in active">
                <h3>Компании</h3>
                @include('block.company')
            </div>
            <div id="panel<?=$panelNumber++;?>" class="tab-pane fade">
                <h3>Панель <?=$panelNumber?></h3>
                <p>Содержимое <?=$panelNumber?> панели...</p>
                <button class="zm9k">zm9k</button><br>

            </div>

            <div id="panel<?=$panelNumber++;?>" class="tab-pane fade">
                <h3>Панель <?=$panelNumber?></h3>
                <p>Содержимое <?=$panelNumber?> панели...</p>
            </div>
        </div>
    </div>
</div>