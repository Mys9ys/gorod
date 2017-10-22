@extends('layouts.app')

@section('content')

    <?$testChel = array();?>
    <?for($count=0; $count<= 10000; $count++){
//        $testChel[] = array('name'=> $count, 'money'=> '10');
    }?>


<!--            --><?//dd($testChel);?>
    <?$arrayChel = [
        array( 'name'=> 'ААА', 'money' => '10' ),
        array( 'name'=> 'ААБ', 'money' => '10' ),
        array( 'name'=> 'ААВ', 'money' => '10' ),
        array( 'name'=> 'ААГ', 'money' => '10' ),
        array( 'name'=> 'ААД', 'money' => '10' ),
        array( 'name'=> 'ААЕ', 'money' => '10' ),
    ];?>
<!--    --><?//dd($arrayChel);?>
    <div class="map" <?$ChelId = 0;?>>
        @foreach($arrayChel as $Chel)
            <div class="chel"
                 data-id="<?=$ChelId++;?>"
                 data-name="<?=$Chel['name']?>"
                 data-money="<?=$Chel['money']?>"
                 data-food="" ><?=$Chel['name']?></div>
        @endforeach
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

    <button class="reset">Reset</button>

@endsection
