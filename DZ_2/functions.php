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
    $is_num = implode('', $num_arr);
    if (is_numeric($is_num)) {
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
    } else {
        echo 'ошибка: В передоваемом параметре должны быть только числа!';
    }
}
//Задание 3
function task3()
{
    $args = func_get_args();//массив параметров
    $action = array_shift($args);
    $is_num = implode('', $args);
    $is_num = str_replace('.', "", $is_num);
    if (is_numeric($is_num)) {
        $counts = count($args); // колличество параметров в массиве
        $res = $args[0]; // получаем второй элемент массива
        if ($counts >= 2) {
            switch ($action) {
                case '+':
                    for ($i = 1; $i < $counts; $i++) { // начинаем со второго элемента, первый уже занесли в $res
                        $res += $args[$i];
                    }
                    return $res;
                    break;
                case '-':
                    for ($i = 1; $i < $counts; $i++) {
                        $res -= $args[$i];
                    }
                    return $res;
                    break;
                case '*':
                    for ($i = 1; $i < $counts; $i++) {
                        $res *= $args[$i];
                    }
                    return $res;
                    break;
                case '/':
                    for ($i = 1; $i < $counts; $i++) {
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
    } else {
        echo 'ошибка: В передоваемом параметре должны быть только числа!';
    }
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
    return false;
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
    //$cc = floor($c / 2);
    $in = $c - 1;
    $f = '';
    $g = '';
    $n_str = array_reverse($str_arr);
    for ($i = 0; $i <= $in; $i++) {
        $f .= $str_arr[$i];
        $g .= $n_str[$i];
    }
    if ($f != $g) {
        //echo $str_arr[$i] . ' - ' . $n_str[$i] . '<br>';
        return false;
    }
    return true;
}
$ret = function ($str) {
    if (task5($str)) {
        echo 'Строка Палиндром';
    } else {
        echo 'Строка не палиндром';
    }
};
//Задание 6
// выведем информацию о текущей дате
$today = function () {
    return date("d.m.Y H:i");
};
// вернем метку времени для заданной даты 24.02.2016 00:00:00
$unxtime = function () {
    return date("d.m.Y H:i:s", mktime(0, 0, 0, 02, 24, 2016));
};
//задание 7
function task6()
{
        $str = 'Карл у Клары украл Кораллы';
        $char = 'К';
        return str_replace($char, "", $str);
}

function task6_2()
{
    $str = 'Две бутылки лимонада'; // Заменил и дополнил
    $old_val = ['Две', 'лимонада'];
    $new_val = ['Три', 'рома'];
    return str_replace($old_val, $new_val, $str);
}
//задание 8
function task7($s)
{
    $packets = preg_match("#packets:[0-9]{1,6}#", $s, $matches_p);
    $smile = preg_match("#[:)]{2,2}#", $s, $matches_s);
    if ($smile) {
        //$str_smile = $matches_s[0]; // заносим первый элемент в строку
        //echo $str_smile;
        print_smile();
    } else {
        $str_pack = $matches_p[0]; // заносим первый элемент в строку
        $pack = explode(":", $str_pack); // разделяем строку на массив
        $num = $pack[1]; // получаем колличество пакетов
        if ($num > 1000) {
            return 'Сеть есть';
        } else {
            return 'количество пакетов < 1000';
        }
    }
    return false;
}

function print_smile()
{
    $smile = 'ヽ(•‿•)ノ';
    echo $smile;
}
//задание 9
function task8($filename)
{
    if ($filename) {
        echo file_get_contents('test.txt');
    } else {
        echo 'Имя файла не указано или не корректно';
    }
}
//задание 10
function task9($filename, $text)
{
    // w+ создается если нет файла, можно сначало проверить на существование file_exists() - затем создать w
    if ($filename && $text) {
        $handle = fopen($filename, "w+");
        fwrite($handle, $text);
        fclose($handle);
    } else {
        echo 'Нужно указать имя файла и текст для записи';
        return false;
    }
    return 'Запись прошла успешно' . '<br>' . 'В файл было записвно: ' . file_get_contents($filename);
}
