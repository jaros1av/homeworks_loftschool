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

if ($_POST['scr'] == 'regform') {
    $error = true;
    $errortext = 'Неверные двнные';
    if ((!empty($_POST['login']) && (!is_numeric($_POST['login']))) && (!empty($_POST['password']) &&
            !empty($_POST['rpassword'])) && ($_POST['password'] == $_POST['rpassword'])) {
        $login = clean_date($_POST['login']);
        $pwd = clean_date($_POST['password']);
        $crypt_pwd = crypt("$pwd", "123");
//echo $l . ' - ' . $p . ' - ' . $p2 . ' - ';
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=dz4;charset=utf8', 'root', '');
            $usr = $pdo->prepare("INSERT INTO users (login, password)
        VALUES (:login, :pwd)");
            $usr->bindParam(':login', $login);
            $usr->bindParam(':pwd', $crypt_pwd);
            $auth_usr = $pdo->query("SELECT login FROM users where login = '$login'");
            $auth_usr = $auth_usr->FETCH(PDO::FETCH_ASSOC);
            if ($auth_usr['login']) {
                $error = true;
                $errortext = 'такой логин уже зарегистрирован!';
            } else {
                $usr->execute();
                $error = false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    $response = ['error' => $error, 'errortext' => $errortext];
    echo json_encode($response);
}
if ($_POST['scr'] == 'usrform') {
    $error = true;
    $errortext = 'Введены неверные двнные';
//    if ((!empty($_POST['name']) && !is_numeric($_POST['name'])) && (!empty($_POST['day']) && is_numeric($_POST['day']))
//        && (!empty($_POST['mounth']) && is_numeric($_POST['mounth'])) && (!empty($_POST['age'])
//            && is_numeric($_POST['age'])) && (!empty($_POST['description']) && !is_numeric($_POST['description']))) {
        $name = clean_date($_POST['name']);
        $day = clean_date($_POST['day']);
        $mounth = clean_date($_POST['mounth']);
        $age = clean_date($_POST['age']);
        $usr_date = $age . $mounth . $day;
        $description = clean_date($_POST['description']);
        $login = $_SESSION['authorized'];
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=dz4;charset=utf8', 'root', '');
            $idU = $pdo->query("SELECT id FROM users where login = '$login'");
            $idU = $idU->FETCH(PDO::FETCH_ASSOC);
            $idU = $idU['id'];
//            $add_usr = $pdo->query("SELECT id_users FROM desc_users where id_users = '$idU'");
//            $add_usr = $add_usr->FETCH(PDO::FETCH_ASSOC);
//            $add_usr = $add_usr['id_users'];
            if (($_FILES['photo'][$error] == 0)) { // берем расширение (pop возвр послед эл-т array) jpg
                $exten = array_pop(explode('.', $_FILES['photo']['name']));
                $type = $_FILES['photo']['type']; //image/jpeg
                if ($_FILES['photo']['type'] == 'image/jpeg' && $exten == 'jpg') {
                    $uploads_dir = 'photo';
                    $tmp = $_FILES['photo']['tmp_name'];
                    $p_name = $_FILES['photo']["name"];
                    $n_name = $idU . '_' . $p_name;
                    move_uploaded_file($tmp, "$uploads_dir/$n_name");
                    $photo = $n_name;
                }
            } else {
                $photo = 'Фотография не была загружена';
            }
            $usr = $pdo->prepare("INSERT INTO desc_users (id_users, name, age, description, photo)
        VALUES (:id_users, :name, :age, :description, :photo)");
            $usr->bindParam(':id_users', $idU);
            $usr->bindParam(':name', $name);
            $usr->bindParam(':age', $usr_date);
            $usr->bindParam(':description', $description);
            $usr->bindParam(':photo', $photo);
            $usr->execute();
//            if ($add_usr) {
//                $error = true;
//                $errortext = 'Данные уже записаны!';
//            } else {
//                $usr->execute();
//            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $error = false;
    }
    $response = ['error' => $error, 'errortext' => $errortext];
    echo json_encode($response);
//}

//$exten = array_pop(explode('.',$_FILES['photo']['name']));// берем расширение (pop возвр послед эл-т array) jpg
//echo $exten;
//$type = $_FILES['photo']['type']; //image/jpeg
//echo $type;
//print_r($_FILES['photo']);
//$uploads_dir = 'photo';
//$tmp = $_FILES['photo']['tmp_name'];
//$name = $_FILES['photo']["name"];
//move_uploaded_file($tmp, "$uploads_dir/$name");