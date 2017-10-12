<?php
//Задание 1
function task1($str_arr, $flag = false)
{
    if ($flag) {
        $merge_str = implode(" ", $str_arr);
        return $merge_str;
    } else {
        foreach ($str_arr as $item) {
            echo '<p>' . $item . '</p>';
        }
    }
}
/**
 *  в таком виде выводит только первое слово
 * foreach ($str_arr as $item) {
 * return $item;
 * } так происсхолит, потому что return выводит первый элемент и выходит из цикла?
 */
//Задание 2
