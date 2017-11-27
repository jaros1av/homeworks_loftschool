<?php
$str = 'Hello Big World';
echo 'Before : ' . $str . '<br><hr>';
$str = explode(" ", $str);
//print_r($str);
$letter = count($str) - 1; // получаем колличество элементов в массиве и отнимаем 1, так как массив начинается с 0
while ($letter >=0) {
    $rev_str[] = $str[$letter];
    $letter--;
}
//print_r($rev_str);
$rev_str = implode("***", $rev_str);
echo 'After : ' . $rev_str;
/**
 * Правильным ли было использовать count($str) - 1?
 */
