<?php
//require_once '/app/Calendar.php';
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Calendar;


$calendar = new Calendar();
$calendar->countday = 7;
$calendar->id = 1;
$calendar->update();

$count = $_REQUEST['count'];
$text = 'mi tyt';
$fp = fopen("file.txt", "w" );
fwrite($fp, $count);
