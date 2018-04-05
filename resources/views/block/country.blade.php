<link href="{{ URL::asset('public/block/country/style.css') }}" rel="stylesheet" type="text/css" >

<div class="create_country">
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
<?$arCountries = \App\Country::all();
$arHuman = \App\Human::all();
//dd(count($arCountries));
//dd($arCountries[0]->name);
if(count($arCountries)>1){
    foreach ($arCountries as $country){?>
        <div class="country-button" data-id="<?=$country->id?>"><?=$country->name?></div>
    <?}
} else {
$country = $arCountries[0]?>
    <div class="country-button" data-id="<?=$country->id?>"><?=$country->name?></div>
<?}?>





<script src="{{ URL::asset('public/block/country/script.js') }}"></script>