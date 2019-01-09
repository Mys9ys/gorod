<link href="{{ URL::asset('public/block/company/style.css') }}" rel="stylesheet" type="text/css">
<?php $title = 'Тут тайтл'; ?>
@section('title', $title)
{{--@include('view.name', ['title' => $title])--}}
<div class="generate_company add_btn">
    <span class="fa-stack">
        <i class="fa fa-plus fa-stack-1x" aria-hidden="true"></i>
        <i class="fa fa-circle-o fa-stack-2x" aria-hidden="true"></i>
    </span>
    <span class="hidden-title">Добавить компанию</span>

</div>
<?$arCompanies = \App\Company::where('city', '=', $_COOKIE['CityID'])->get()?>
<?//dd($arCompanies)?>
<div class="container">
<!--    --><?//dd($arCompanies)?>
    <??>
    <?foreach($arCompanies as $arCompany){?>
    <div class="company_box">
        <div class="select_wrap"></div>
        <div class="company_name"><?=$arCompany->name?></div>
        <div class="company_info">
            <div class="company_money">
                <i class="fa fa-money left" aria-hidden="true"></i>
                <div class="company_money_count left"><?=$arCompany->money?></div>
                <div class="company_profit left"><?=$arCompany->profit?></div>
            </div>
            <div class="company_worker">
<!--                --><?//dd($workers_count)?>
                <div class="worker_contain left">
                    <?if(isset($arCompany->workers)){
                        $workers = array_diff(explode(';', $arCompany->workers), array(''));
                        $workers_count=count($workers);
                        foreach ($workers as $worker){?>
                            <i class="fa fa-user left" aria-hidden="true" data-toggle="tooltip" data-placement="top"
                               data-html="true" data-title="<?=\App\Human::find($worker)['name']?><br>Money: <?=\App\Human::find($worker)['money']?>"></i>
                        <?}?>
                    <?}?>
                    <?for($i=0;$i<$arCompany->workplace;$i++){?>
                        <i class="fa fa-user-o left" aria-hidden="true"></i>
                    <?}?>
                </div>
                <div class="add_worker left" data-companyID="<?=$arCompany->id?>">+</div>
            </div>
            <div class="company_material">
                <div class="material_name left">material</div>
                <i class="fa fa-th-large left" aria-hidden="true"></i>
                <div class="material_percent">25%</div>
            </div>
            <div class="company_product">
                <div class="product_name left">product</div>
                <i class="fa fa-th-large left" aria-hidden="true"></i>
                <div class="product_count">шт.</div>
            </div>
        </div>
    </div>
    <?}?>

</div>

<script src="{{ URL::asset('public/block/company/script.js') }}"></script>
