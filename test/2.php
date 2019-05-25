<?php

function betweenDays($from,$to){

    $start = new DateTime($from);
    $interval = new DateInterval('P1D');
    $end = new DateTime($to);
    $end = $end->modify('+1 day');

    $period = new DatePeriod($start, $interval, $end);

    foreach ($period as $key =>$value){
        echo $value->format('Y-m-d')." ";
    }
}

betweenDays('2019-11-01', '2019-11-05');

?>