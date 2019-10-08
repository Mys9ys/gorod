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
dd($arCountry);
?>
