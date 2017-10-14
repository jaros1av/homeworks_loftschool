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
