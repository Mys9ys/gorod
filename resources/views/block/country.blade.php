<link href="{{ URL::asset('public/block/country/style.css') }}" rel="stylesheet" type="text/css">

<div class="create_country add_btn">
    <span class="fa-stack">
        <i class="fa fa-plus fa-stack-1x" aria-hidden="true"></i>
        <i class="fa fa-circle-o fa-stack-2x" aria-hidden="true"></i>
    </span>
    <span class="hidden-title">Создать страну</span>
</div>

{{--<div class="form-wrap">--}}
{{--<input class="form-info country_name" type="text" placeholder="Название">--}}
{{--<span class="form-title">Сгенерировать</span>--}}
{{--</div>--}}
<?if(isset($_COOKIE['CountryID'])){?>
    <?$country = \App\Country::find($_COOKIE['CountryID']);?>
    <?$treasury = \App\Treasury::find($_COOKIE['CountryID']);?>
    <?$jobless = \App\Human::where('born_country', '=', $_COOKIE['CountryID'])->where('job', '=', 0)->get();?>
    <div class="country_title">
        Информация о стране <?=$country->name;?>
    </div>
    <p class="country_info_item"><span>Казна: </span><?=$treasury->money;?> <div class="country_btn addMoneyTreasury">Выпустить деньги</div></p>
    <p class="country_info_item"><span>Выдать пособие: </span><?=20;?> <div class="country_btn gosZP" data-country="<?=$_COOKIE['CountryID']?>">Выдать</div></p>
    <p class="country_info_item"><span>Население: </span><?=$country->population;?></p>
    <p class="country_info_item"><span>Безработные: </span><?=count($jobless)?></p>
<?} else {?>

<?}?>

<script src="{{ URL::asset('public/block/country/script.js') }}"></script>