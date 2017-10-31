<?php
function clean_date($value)
{
    $value = trim($value); // убираем пробелы
//    $value = str_replace(" ", "", $value); //убираем все пробелы
    $value = stripslashes($value); //удаление экранированных символов
    $value = strip_tags($value); // удаление html и php тегов
    $value = htmlspecialchars($value); //спецсимволы в html сущности
    return $value;
}
if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['street'])
     && !empty($_POST['home']) && !empty($_POST['appt']) && !empty($_POST['floor'])) {
    $login = clean_date($_POST['name']);
    $mail = clean_date($_POST['email']);
    $phone = clean_date($_POST['phone']);
    $street = clean_date($_POST['street']);
    $home = clean_date($_POST['home']);
    $part = clean_date($_POST['part']);
    $flat = clean_date($_POST['appt']);
    $floor = clean_date($_POST['floor']);
    $comment = clean_date($_POST['comment']);
    $change = clean_date($_POST['payment']);
    $callback = clean_date($_POST['callback']);
    if (!isset($callback)) {
        $callback = 'Перезвонить';
    } else {
        $callback = 'Не перезванивать';
    }
    if (!isset($change) || $change == 'card') {
        $change = 'По карте';
    } else {
        $change = 'Нужна сдача';
    }
    if (empty($comment)) { //если поле коммента пусто
        $comment = 'Комментария к заказу нет';
    }
    if (empty($part) || $part == '0') {
        $change = 'Корпуса нет';
    }
//    $login = 'ssss';
//    $mail = 'S@SSS';
//    $phone = '9649284';
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=vp1;charset=utf8', 'root', '');
        $stmt = $pdo->prepare("INSERT INTO Users (name,email,phone) VALUES (:login, :mail, :phone)");
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':mail', $mail);
        $stmt->bindParam(':phone', $phone);
        $stmt->execute();
//        $idU = $pdo->query("SELECT id FROM Users WHERE email = '$mail'");
//        $stmt = $pdo->prepare("INSERT INTO Orders (idUsers, needChang, callback, comment)
//        VALUES (:iduser, :nchange, :callback, :comment)");
//        $stmt->bindParam(':iduser', $idU);
//        $stmt->bindParam(':nchange', $change);
//        $stmt->bindParam(':callback', $callback);
//        $stmt->bindParam(':comment', $comment);
//        $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


