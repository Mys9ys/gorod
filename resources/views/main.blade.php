@include('layouts.header')
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
            @include('block.country')
        </div>
        <div id="panel<?=$panelNumber++;?>" class="tab-pane fade">
            <h3>Население</h3>
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


</div>
@include('layouts.footer')