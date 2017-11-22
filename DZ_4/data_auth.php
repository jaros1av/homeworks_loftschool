<?php
session_start();
function clean_date($value)
{
    $value = trim($value); // убираем пробелы
    $value = stripslashes($value); //удаление экранированных символов
    $value = strip_tags($value); // удаление html и php тегов
    $value = htmlspecialchars($value); //спецсимволы в html сущности
    return $value;
}
if (!empty($_POST['login']) && (!is_numeric($_POST['login']))) {
//    $login = 'nikola@nik.ru';
    $_SESSION['login'] = clean_date($_POST['login']);
    $login = $_SESSION['login'];
    $password = clean_date($_POST['password']);
    $password = crypt("$password", "123");
    try {$pdo = Db::getInstance();
        $pdo = new PDO('mysql:host=localhost;dbname=dz4;charset=utf8', 'root', '');
        $usr = $pdo->query("SELECT login, password FROM users where login ='$login'");
        $res = $usr->FETCHALL(PDO::FETCH_ASSOC);
        foreach ($res as $ress) {
            if (($ress['password'] == $password && $ress['login'] == $login)) {
                $_SESSION['authorized'] = $_SESSION['login'];
                header("location: edit-profile.php");
                exit();
            }
        }
        sleep(3);
        header("location: reg.php");
        exit();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
} else {
    sleep(3);
    header("location: index.php");
    exit();
}
