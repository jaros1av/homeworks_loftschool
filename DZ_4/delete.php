<?php
session_start();
if(isset($_GET['userid'])){
  $id = $_GET['userid'];
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=dz4;charset=utf8', 'root', '');
        $delete = $pdo->query("DELETE FROM users where users.id ='$id'");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
unset($_SESSION['authorized']);
    header("location: list.php");
}
if(isset($_GET['fileid'])){
    $id = $_GET['fileid'];
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=dz4;charset=utf8', 'root', '');
        $delete = $pdo->query("UPDATE desc_users SET photo='Фото удалено' where desc_users.id_users ='$id'");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    header("location: filelist.php");
}