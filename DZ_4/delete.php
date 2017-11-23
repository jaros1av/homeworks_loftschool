<?php
session_start();
require_once 'connDB.php';
if(isset($_GET['userid'])){
  $id = $_GET['userid'];
    try {
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
        $delete = $pdo->query("UPDATE desc_users SET photo='Фото удалено' where desc_users.id_users ='$id'");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    header("location: filelist.php");
}