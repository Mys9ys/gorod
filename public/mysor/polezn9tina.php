<?php
// определение времени выполнения операции
    //перед операцией
$start = microtime(true);
    //после операции
$finish = microtime(true);
$delta = $finish - $start;
echo $delta . ' сек.';