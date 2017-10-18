@extends('layouts.app')

@section('content')

    <?use App\Calendar;?>
    <?use Illuminate\Database\Eloquent\Model;?>
    <?use Illuminate\Http\Request;?>

<?

    ?>


<?//dd($calendar)?>

    <?$testChel = array();?>
    <?for($count=0; $count<= 10000; $count++){
        $testChel[] = array('name'=> $count, 'money'=> '10');
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
        @foreach($testChel as $Chel)
            <div class="chel"
                 data-id="<?=$ChelId++;?>"
                 data-name="<?=$Chel['name']?>"
                 data-money="<?=$Chel['money']?>"
                 data-food="" ><?=$Chel['name']?></div>
        @endforeach
    </div>

    <div class="calendar" data-countDay="1">
        <div id="day">1</div>
        <div id="month">1</div>
        <div id="year">1</div>
        <div id="nextDay">>></div>
    </div>



@endsection
