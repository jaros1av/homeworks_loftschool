<?php
$day = rand(1, 8);
switch ($day){
    case 1 :
    case 2 :
    case 3 :
    case 4 :
    case 5 :
        echo 'День ' . $day . ' - это рабочий день';
    break;
    case 6 :
    case 7 :
        echo 'День ' . $day . ' - это выходной день';
    break;
    default :
        echo 'День ' . $day . ' - неизвестный день!';
}