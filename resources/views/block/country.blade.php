<link href="{{ URL::asset('public/block/country/style.css') }}" rel="stylesheet" type="text/css">

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
<?if(empty($_COOKIE['CountryID'])){?>
    <?$arCountries = \App\Country::all();
    if(count($arCountries) > 1){
        foreach ($arCountries as $country){?>
            <div class="country-button" data-id="<?=$country->id?>"><?=$country->name?></div>
        <?}
    } else {
        $country = $arCountries[0]?>
        <div class="country-button" data-id="<?=$country->id?>"><?=$country->name?></div>
    <?}?>
<?}?>

<?if(empty($_COOKIE['CityID']) && !empty($_COOKIE['CountryID'])){?>
    <?$arCities = \App\City::where('country', $_COOKIE['CountryID'])->get();
    if(count($arCities) > 1){
        foreach ($arCities as $city){?>
            <div class="city-button" data-id="<?=$city->id?>"><?=$city->name?></div>
        <?}
    } else {
        $city = $arCities[0]?>
        <div class="city-button" data-id="<?=$city->id?>"><?=$city->name?></div>
    <?}?>
<?}?>

<script src="{{ URL::asset('public/block/country/script.js') }}"></script>