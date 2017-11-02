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
    if (empty($part)) {
        $part = '0';
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
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=vp1;charset=utf8', 'root', '');
        $usr = $pdo->query("SELECT email FROM Users WHERE email = '$mail'");
        $res = $usr->FETCH(PDO::FETCH_ASSOC);
        $send = $res["email"]; /* Проверкак есть ли уже пользователь с таким email*/
        if ($send == $mail) { //если есть такой email в базе, заносим только данные заказа
            $idM = $pdo->query("SELECT id FROM Users WHERE email = '$mail'");
            $resm = $idM ->FETCH(PDO::FETCH_ASSOC);
            $idU = $resm["id"]; // Получение id если есть такой email
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
            $id_ordr = $pdo->lastInsertId(); //id заказа
        } else { // Если нет такого юзера, заносим данные о нем и о его заказе
            $stmt = $pdo->prepare("INSERT INTO Users (name,email,phone) VALUES (:login, :mail, :phone)");
            $stmt->bindParam(':login', $login);
            $stmt->bindParam(':mail', $mail);
            $stmt->bindParam(':phone', $phone);
            $stmt->execute();
            $idU = $pdo->lastInsertId(); // id юзера
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
            $id_ordr = $pdo->lastInsertId(); //id заказа
        }
        /*Отправка письма*/
        $count_orders = $pdo->query("SELECT COUNT(idUsers) FROM Orders WHERE Orders.idUsers = '$idU'");
        $count_order = $count_orders->FETCH(PDO::FETCH_ASSOC);
        $count_order = $count_order['COUNT(idUsers)'];
        $to = $mail;
        $subcect = 'Заказ № ' . $id_ordr;
        $order_msg = 'Спасибо - это ваш ' . $count_order . ' заказ' ;
        $inf_order = 'DarkBeefBurger за 500 рублей, 1 шт';
        $message='<html><head><title>'.$subcect.'</title></head><body><p><span style="font-size:18px;">'.
            'Ваш заказ будет доставлен по адресу: '. '</span>'. '<p> Улица ' . $street . ', дом ' . $home .
            ', квартира ' . $flat . ', этаж ' . $floor .'</p>' . '<p style="margin:10px 0px;">' .
            'Описание заказа: ' . $inf_order . '</p>' . '<p>' . $order_msg.'</p></body></html>';
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";
        $headers .="From:info@burgers24.ru\r\n";
        $headers .= "Reply-To:no-reply@burgers24.ru\r\n";
        mail($to, $subcect, $message, $headers);
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }
} else {
    return false;
//    $err = 'Заказ не оформлен, проверьте правильность заполнения формы!';
//    $result = ['Error'=>$err];
//    echo json_encode($result);
}