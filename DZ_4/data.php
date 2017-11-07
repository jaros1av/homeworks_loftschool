<?php
//function clean_date($value)
//{
//    $value = trim($value); // убираем пробелы
//    $value = stripslashes($value); //удаление экранированных символов
//    $value = strip_tags($value); // удаление html и php тегов
//    $value = htmlspecialchars($value); //спецсимволы в html сущности
//    return $value;
//}
//
//if ($_POST['scr'] == 'regform') {
//    $error = true;
//    $errortext = 'Неверные двнные';
//    if ((!empty($_POST['login']) && (!is_numeric($_POST['login']))) && (!empty($_POST['password']) &&
//            !empty($_POST['rpassword'])) && ($_POST['password'] == $_POST['rpassword'])) {
//        $login = clean_date($_POST['login']);
//        $pwd = clean_date($_POST['password']);
//        $crypt_pwd = crypt("$pwd", "123");
////echo $l . ' - ' . $p . ' - ' . $p2 . ' - ';
//        try {
//            $pdo = new PDO('mysql:host=localhost;dbname=dz4;charset=utf8', 'root', '');
//            $usr = $pdo->prepare("INSERT INTO users (login, password)
//        VALUES (:login, :pwd)");
//            $usr->bindParam(':login', $login);
//            $usr->bindParam(':pwd', $crypt_pwd);
//            $auth_usr = $pdo->query("SELECT login FROM users where login = '$login'");
//            $auth_usr = $auth_usr->FETCH(PDO::FETCH_ASSOC);
//            if ($auth_usr['login']) {
//                $error = true;
//                $errortext = 'такой логин уже зарегистрирован!';
//            } else {
//                $usr->execute();
//                $error = false;
//            }
//        } catch (PDOException $e) {
//            echo $e->getMessage();
//        }
//    }
//    $response = ['error' => $error, 'errortext' => $errortext];
//    echo json_encode($response);
//}
//if ($_POST['scr'] == 'usrform') {
//if ((!empty($_POST['name']) && !is_numeric($_POST['name'])) && (!empty($_POST['age'])) ){
//
//}
//}
$a = '2008-13-90';
var_dump(is_numeric($a));
