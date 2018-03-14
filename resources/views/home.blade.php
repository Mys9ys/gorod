@extends('layouts.app')

@section('content')
    <div class="container">
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

        <?$panelNumber=1;?>
        <div class="tab-content">
            <div id="panel<?=$panelNumber++;?>" class="tab-pane fade">
                <h3>Меню</h3>
                <div class="gameMenuButton">
                    <button class="startGame">Начать игру</button>
                    <a href="/setting"><button class="gameSettings">Настройки</button></a>
                    <button class="addHuman">Добавить человечков</button>
                    <button class="reset">Reset</button> 
                </div>
            </div>
            <div id="panel<?=$panelNumber++;?>" class="tab-pane fade in active">
                <h3>Государство</h3>
            </div>
            <div id="panel<?=$panelNumber++;?>" class="tab-pane fade">
                <h3>Население</h3>
                <input type="text" id="searchText">
                <button id="searchButton">Найти</button>
                <div class="clr"></div>
                <?foreach($humans as $human) {?>
                <div class="human"
                     data-id="<?=$human['id'];?>"
                     data-name="<?=$human['name']?>"
                     data-money="<?=$human['money']?>"
                     data-job="<?=$human['job']?>"
                     data-food="" ><?=$human['name']?>
                    <span class="badge"><?=$human['money']?></span>
                </div>
                <?}?>
                <div class="clr"></div>
            </div>
            <div id="panel<?=$panelNumber++;?>" class="tab-pane fade">
                <h3>Компании</h3>
                <p>Содержимое <?=$panelNumber?> панели...</p>
            </div>
            <div id="panel<?=$panelNumber++;?>" class="tab-pane fade">
                <h3>Панель <?=$panelNumber?></h3>
                <p>Содержимое <?=$panelNumber?> панели...</p>
            </div>

            <div id="panel<?=$panelNumber++;?>" class="tab-pane fade">
                <h3>Панель <?=$panelNumber?></h3>
                <p>Содержимое <?=$panelNumber?> панели...</p>
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
    </div>



@endsection
