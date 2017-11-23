<?php
class Db
{
//    private $_conn; //соединение с БД
//    private static $_instance; // будущий экземляр класса
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }
    private function __wakeup()
    {
        // TODO: Implement __wakeup() method.
    }
//
//    private function __construct() // вызывается при создании экз. класса
//    {
//        $dsn = 'mysql:host=localhost;dbname=dz4;charset=utf8';
//        $pdo = $this->_conn = new PDO($dsn, 'root', '');
//        return $pdo;
//    }
//    public static function getInstance()
//    {
//        if (empty(self::$_instance)) {
//            self::$_instance = new self();
//        }
//        return self::$_instance;
//    }
//    public function regUser($login, $crypt_pwd){
//        try {
//            $usr = $this->_conn->prepare("INSERT INTO users (login, password)
//        VALUES (:login, :pwd)");
//            $usr->bindParam(':login', $login);
//            $usr->bindParam(':pwd', $crypt_pwd);
//            $auth_usr = $this->_conn->query("SELECT login FROM users where login = '$login'");
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
    public static function getConnection() {
        $dsn = 'mysql:host=localhost;dbname=dz4;charset=utf8';
        $pdo = new PDO($dsn, 'root', '');
        return $pdo;
    }
}
//$pdo = Db::getInstance();
$pdo = Db::getConnection();
