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
    if (empty($part) || $part == '0') {
        $change = 'Корпуса нет';
    }
    $flat = clean_date($_POST['appt']);
    $floor = clean_date($_POST['floor']);
    $comment = clean_date($_POST['comment']);
    if (empty($comment)) { //если поле коммента пусто
        $comment = 'Комментария к заказу нет';
    }
    $change = $_POST['payment'];
    if (!isset($change) || $change == 'change') {
        $change = 'Нужна сдача';
    } else {
        $change = 'По карте';
    }
    $callback = $_POST['callback'];
    if (!isset($callback)) {
        $callback = 'Перезвонить';
    } else {
        $callback = 'Не перезванивать';
    }
//    $mail = 'victor@trest.ru';
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=vp1;charset=utf8', 'root', '');
        $usr = $pdo->query("SELECT email FROM Users WHERE email = '$mail'");
        $res = $usr->FETCH(PDO::FETCH_ASSOC);
        $send = $res["email"];
        if ($send == $mail) {
            $idM = $pdo->query("SELECT id FROM Users WHERE email = '$mail'");
            $resm = $idM ->FETCH(PDO::FETCH_ASSOC);
            $ret = $resm["id"];
            $stmt = $pdo->prepare("INSERT INTO Orders (idUsers, needChang, callback, comments, streets, house,
        flat, floors, part)
        VALUES (:iduser, :nchange, :callback, :comments, :streets, :house, :flat, :floors, :part)");
            $stmt->bindParam(':iduser', $ret);
            $stmt->bindParam(':nchange', $change);
            $stmt->bindParam(':callback', $callback);
            $stmt->bindParam(':comments', $comment);
            $stmt->bindParam(':streets', $street);
            $stmt->bindParam(':house', $home);
            $stmt->bindParam(':flat', $flat);
            $stmt->bindParam(':floors', $floor);
            $stmt->bindParam(':part', $part);
            $stmt->execute();
        } else {
            $stmt = $pdo->prepare("INSERT INTO Users (name,email,phone) VALUES (:login, :mail, :phone)");
            $stmt->bindParam(':login', $login);
            $stmt->bindParam(':mail', $mail);
            $stmt->bindParam(':phone', $phone);
            $stmt->execute();
            $idU = $pdo->lastInsertId();
            $stmt = $pdo->prepare("INSERT INTO Orders (idUsers, needChang, callback, comments, streets, house,
        flat, floors, part)
        VALUES (:iduser, :nchange, :callback, :comments, :streets, :house, :flat, :floors, :part)");
            $stmt->bindParam(':iduser', $idU);
            $stmt->bindParam(':nchange', $change);
            $stmt->bindParam(':callback', $callback);
            $stmt->bindParam(':comments', $comment);
            $stmt->bindParam(':streets', $street);
            $stmt->bindParam(':house', $home);
            $stmt->bindParam(':flat', $flat);
            $stmt->bindParam(':floors', $floor);
            $stmt->bindParam(':part', $part);
            $stmt->execute();
        }
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }
}