@extends('layouts.app')

@section('content')

    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#panel1">Государство</a></li>
        <li><a data-toggle="tab" href="#panel2">Панель 2</a></li>
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                Другие панели
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li><a data-toggle="tab" href="#panel3">Панель 3</a></li>
                <li><a data-toggle="tab" href="#panel4">Панель 4</a></li>
            </ul>
        </li>
    </ul>

    <div class="tab-content">
        <div id="panel1" class="tab-pane fade in active">
            <h3>Государство</h3>
            <input type="text" id="searchText">
            <button id="searchButton">Найти</button>
            <div class="map">
                <?foreach($humans as $human) {?>
                <div class="chel"
                     data-id="<?=$human['id'];?>"
                     data-name="<?=$human['name']?>"
                     data-money="<?=$human['money']?>"
                     data-job="<?=$human['job']?>"
                     data-food="" ><?=$human['name']?>
                    <span class="badge"><?=$human['money']?></span>
                </div>
                    <div class="clr"></div>
                <?}?>
            </div>
        </div>
        <div id="panel2" class="tab-pane fade">
            <h3>Панель 2</h3>
            <p>Содержимое 2 панели...</p>
        </div>
        <div id="panel3" class="tab-pane fade">
            <h3>Панель 3</h3>
            <p>Содержимое 3 панели...</p>
        </div>
        <div id="panel4" class="tab-pane fade">
            <h3>Панель 4</h3>
            <p>Содержимое 4 панели...</p>
        </div>
    </div>

    <?// Блок календарь?>
    <?$res = $calendar->countDay; $calendar = [];
    if(($calendar['D'] = $res%6 )== 0){$calendar['D'] = 6;}
    if(($calendar['M'] = ceil($res/6)%4) == 0){$calendar['M'] = 4;}
    $calendar['Y'] = ceil($res/24);?>

    <div class="calendar" data-countDay="<?=$res?>">
        <div id="day">{{ $calendar['D'] }}</div>
        <div id="month">{{ $calendar['M'] }}</div>
        <div id="year">{{ $calendar['Y'] }}</div>
        <div id="nextDay">>></div>
    </div>
    <button class="addHuman">Добавить человечков</button>
    <button class="reset">Reset</button>

@endsection
