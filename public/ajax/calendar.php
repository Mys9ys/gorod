<?php
require_once "/app/";



$calendar = new Calendar();
$calendar->countday = 7;
$calendar->id = 1;
$calendar->update();

$count = $_REQUEST['count'];
$text = 'mi tyt';
$fp = fopen("file.txt", "w" );
fwrite($fp, $count);
