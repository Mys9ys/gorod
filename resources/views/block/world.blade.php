<?$countrys = \App\Country::all();?>
<?
//dd($countrys);
$arCountry = [];
foreach($countrys as $country){
    $arTemp = [];

    $arTemp['name'] = $country['name'];
    $treasury = \App\Treasury::find($country['id']);

    $arTemp['money'] = $treasury['money'];
    $population = \App\Human::where('born_country', '=', $country['id'])->get();
    $jobless = \App\Human::where('born_country', '=', $country['id'])->where('job', '=', 0)->get();
    $arTemp['population'] = count($population);
    $arTemp['humans'] = $population;
    $arTemp['jobless'] = count($jobless);
    $city = \App\City::where('country', '=', $country['id'])->get();
    $arTemp['countcity'] = count($city);
    $arTemp['city'] = $city;

    $arCountry[$country['id']] = $arTemp;
}

?>
<?foreach($arCountry as $key=>$country){?>
    <div class="country_box">
        <a class="info_btn" href="{{ route('country', ['id' => $key]) }}"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
        <div class="country_name"><?=$country['name']?></div>
        <div class="country_count_city"><?=$country['countcity']?></div>
        <div class="country_population"><?=$country['population']?></div>
        <?=$key?>
    </div>
<?}?>