<?php
function clean_date($value)
{
    $value = trim($value); // убираем пробелы
    $value = stripslashes($value); //удаление экранированных символов
    $value = strip_tags($value); // удаление html и php тегов
    $value = htmlspecialchars($value); //спецсимволы в html сущности
    return $value;
}
$login = $_POST['name'];
$mail = $_POST['email'];
$phone = $_POST['phone'];
$street = $_POST['street'];
$home = $_POST['home'];
$part = $_POST['part'];
$flat = $_POST['appt'];
$floor = $_POST['floor'];
$comment = $_POST['comment'];
$change = $_POST['payment'];
$callback = $_POST['callback'];
if (!empty($login) && !empty($mail) && !empty($phone) && !empty($street)
    && !empty($home) && !empty($part) && !empty($flat) && !empty($floor)) {
    $login = clean_date($login);
    $mail = clean_date($mail);
    $phone = clean_date($phone);
    $street = clean_date($street);
    $home = clean_date($home);
    $part = clean_date($part);
    $flat = clean_date($flat);
    $floor = clean_date($floor);
    if (empty($comment)) {
        $comment = 'Комментария к заказу нет';
    } else{
        $comment = clean_date($comment);
    }
    if (empty($change)) {
        $change = '0';
    }
    if (empty($callback)) {
        $callback = '0';
    }
    $str = "$login - $mail - $phone - $street - $home - $part - $flat - $floor - $comment - $change - $callback";
    $handle = fopen('output.txt', "w+");
    fwrite($handle, $str);
    fclose($handle);
} else {
    $str = "Нечего записывать";
    $handle = fopen('output.txt', "w+");
    fwrite($handle, $str);
    fclose($handle);
    echo 'Не полностью заполнена форма';
}

//echo $login .'<br>';
//echo $mail .'<br>';
//echo $phone .'<br>';
//echo $street .'<br>';
//echo $home .'<br>';
//echo $part .'<br>';
//echo $flat .'<br>';
//echo $floor .'<br>';
//echo $comment .'<br>';
//var_dump($callback);
//echo '<br>';
//var_dump($change);