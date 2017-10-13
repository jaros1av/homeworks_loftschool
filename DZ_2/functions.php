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
    return true;
}

//Задание 2
function task2($num_arr, $action)
{
    $items = count($num_arr);
    $res = $num_arr[0]; // получаем первый элемент массива
//    if ($items) {
//        foreach ($num_arr as $items) {
//            $item = $items;
//            if (!(is_numeric($item))) {
//                echo 'Ошибка ввода: необходимо указать числа';
//            }
//        }
//    }
     if ($items <= 1) {
        echo 'Ошибка ввода: необходимо указать минимум 2 числа';
    } else {
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
                    $res /= $num_arr[$i];
                }
                return $res;
                break;
            default:
                echo 'Неверно указана операция!';
        }
    }
}
