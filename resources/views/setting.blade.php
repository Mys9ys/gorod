@extends('layouts.app')

@section('content')


<div class="container">
    <?$tabNumber=1;?>
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#panel<?=$tabNumber++;?>">Компании</a></li>
        <li><a data-toggle="tab" href="#panel<?=$tabNumber++;?>">Продукция</a></li>
    </ul>

    <?$panelNumber=1;?>
    <div class="tab-content">
        <div id="panel<?=$panelNumber++;?>" class="tab-pane fade in active">
            <h3>Шаблоны компаний</h3>
            <div class="companyLibRow">
                <div class="companyLibName badge">Название</div>
                <div class="companyLibWorkplace badge">Рабочих мест</div>
                <div class="companyLibSector badge">Сектор экономики</div>
            </div>
<!--                --><?//dd($companyTemplate[])?>
            <?foreach ($companyTemplate as $template){?>
                <div class="companyLibRow">
                    <input type="text" class="companyLibName badge" data="name" value="<?=$template['name']?>" disabled>
                    <input type="number" class="companyLibWorkplace badge" data="workplace" value="<?=$template['workplace']?>" disabled>
                    <div class="delete"></div><div class="edit"></div>
                </div>
            <?}?>
            <div class="companyLibRow">
                <input type="text" class="companyLibName badge" data="name" value="">
                <input type="number" class="companyLibWorkplace badge" data="workplace" value="">
                <div class="setCompanyLib">Сохранить</div>
            </div>
        </div>
        <div id="panel<?=$panelNumber++;?>" class="tab-pane fade">
            <h3>Шаблоны продуктов</h3>
        </div>
    </div>
</div>

    <div class="container">
    <button class="companyLibrary">Шаблоны компаний</button>
    <div class="companyLibBox"></div>
    <button class="productCatalog">Каталог продукции</button>
    <div class="productCatBox"></div>
</div>

@endsection