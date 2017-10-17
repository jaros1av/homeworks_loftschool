<?php
/**
 * return ведь необязательно должен быть указан?
 * для избежания ошибки и вывода какого либо результата перед выходом из функции, можно указать return false?
 *
 *
 */
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
    return false;
}
//Задание 2
function task2($num_arr, $action)
{
    $items = count($num_arr);
    $res = $num_arr[0]; // получаем первый элемент массива
    if ($items > 1) {
        switch ($action) {
            case '+':
                for ($i = 1; $i < $items; $i++) { // начинаем со второго элемента, первый уже занесли в $res
                    $res += $num_arr[$i];
                }
                return $res;
                break;
            case '-':
                for ($i = 1; $i < $items; $i++) {
                    $res -= $num_arr[$i];
                }
                return $res;
                break;
            case '*':
                for ($i = 1; $i < $items; $i++) {
                    $res *= $num_arr[$i];
                }
                return $res;
                break;
            case '/':
                for ($i = 1; $i < $items; $i++) {
                    if ($num_arr[$i] == 0) {
                        echo 'Делить на ноль нельзя!';
                    }
                    $res /= $num_arr[$i];
                }
                return $res;
                break;
            default:
                echo 'Неверно указана операция!';
        }
    } else {
        echo 'необходимо указать минимум два числа';
    }
    return false;
}
//Задание 3
function task3()
{
    $args = func_get_args();//массив параметров
    $counts = count($args); // колличество параметров в массиве
    $res = $args[1]; // получаем второй элемент массива
    if ($counts >= 3) {
        switch ($args[0]) {
            case '+':
                for ($i = 2; $i < $counts; $i++) { // начинаем со второго элемента, первый уже занесли в $res
                    $res += $args[$i];
                }
                return $res;
                break;
            case '-':
                for ($i = 2; $i < $counts; $i++) {
                    $res -= $args[$i];
                }
                return $res;
                break;
            case '*':
                for ($i = 2; $i < $counts; $i++) {
                    $res *= $args[$i];
                }
                return $res;
                break;
            case '/':
                for ($i = 2; $i < $counts; $i++) {
                    if ($args[$i] == 0) {
                        echo 'Делить на ноль нельзя!';
                    }
                    $res /= $args[$i];
                }
                return $res;
                break;
            default:
                echo 'Неверно указана операция или операция указана не первым параметром!';
        }
    } else {
        echo 'необходимо указать минимум три параметра';
    }
    return false;
}
// Задание 4
function task4($tr, $td)
{
    if ((is_int($tr)) && (is_int($td))) {
        echo'<table border="1" style = "text-align:center">';
        for ($i = 1; $i <= $tr; $i++) {
            echo '<tr>';
            for ($j = 1; $j <= $td; $j++) {
                if (($i == 1) || ($j == 1)) {
                    echo '<th>' . ($i * $j) . '</th>';
                } else {
                    echo '<td>' . ($i * $j) . '</td>';
                }
            }
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'Ошибка: необходимо передать параметром 2 целых числа!';
    }
}
// Задание 5


function task5($str)
{
    $encode = mb_detect_encoding($str);
    $str = str_replace(" ", "", $str); //убираем все пробелы в строке(не только с конца)
    $str = mb_convert_encoding($str, "UTF-8", "$encode");
    $str = mb_strtolower($str);
//    echo $str . '<br>';
    $str_arr = preg_split('//u', $str, -1, PREG_SPLIT_NO_EMPTY); // разбиваем в массив регуляркой
    $c = count($str_arr);
    $cc = floor($c / 2);
    $in = $cc - 1;
    $n_str = array_reverse($str_arr);
    for ($i = 0; $i < $cc; $i++) {

        if ($str_arr[$i] == $n_str[$i]) {
            return true;
        } else {
            return false;
        }
    }
}
$ret = function ($str) {
    if (task5($str)) {
        echo 'Строка Палиндром';
    } else {
        echo 'Строка не палиндром';
    }
};

$today = function () {
    return date("m.d.Y H:i");
};
// вернем метку времени для заданной даты 24.02.2016 00:00:00
$unxtime = function () {
    return date("m-d-Y", mktime(0, 0, 2, 02, 24, 2016));
};
//задание 7
