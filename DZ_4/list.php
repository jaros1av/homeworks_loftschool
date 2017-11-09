<?php
session_start();
if (!($_SESSION['authorized'])){
    header("location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Авторизация</a></li>
            <li><a href="reg.php">Регистрация</a></li>
            <li><a href="list.php">Список пользователей</a></li>
            <li><a href="filelist.php">Список файлов</a></li>
              <li><a href="edit-profile.php">Добавить данные о себе</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
    <h1>Запретная зона, доступ только авторизированному пользователю</h1>
      <h2>Информация выводится из базы данных</h2>
        <?php echo '<p> Вы зашли как:' . $_SESSION['authorized'] . '</p>';
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=dz4;charset=utf8', 'root', '');
            $BD_data = $pdo->query("SELECT users.id, users.login, desc_users.name, desc_users.age, 
desc_users.description,
 desc_users.photo
 FROM users INNER JOIN desc_users ON users.id = desc_users.id_users;");
            $res = $BD_data->FETCHALL(PDO::FETCH_ASSOC);
            echo '<table class="table table-bordered">';
            foreach ($res as $val) {
                $usid = $val['id'];
                $exten = explode('-', $val['age']);
                $date = date(Y);
                $age = $date - $exten['0'];
                echo '<tr>';
                echo "<th>Пользователь(логин)</th>
          <th>Имя</th>
          <th>возраст</th>
          <th>описание</th>
          <th>Фотография</th>
          <th>Действия</th>";
                echo '</tr>';
                echo '<tr>';
                echo '<td>' . $val['login'] . '</td>';
                echo '<td>' . $val['name'] . '</td>';
                echo '<td>' . $age . '</td>';
                echo '<td>' . $val['description'] . '</td>';
                echo '<td><img src='.'"'. 'photo/'. $val['photo']. '"' . '</td>';
                echo '<td><a href="delete.php?userid='.$usid.'">Удалить пользователя</a></td>';
                echo '</tr>';
            }
            echo '</table>';
//      echo '<pre>';
//      print_r($res);
//      echo '</pre>';
//      echo "<br>";

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        ?>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
