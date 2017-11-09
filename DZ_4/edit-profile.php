<?php
session_start();
//if (!isset($_SESSION['authorized'])){
//    header("location: index.php");
//    exit();
//}
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
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">

    <div class="form-container">
        <form method="post" id="usrform" class="form-horizontal" action="data.php" ENCTYPE="multipart/form-data">
                        <div class="form-group">
                            <label for="nameform" class="col-sm-2 control-label">Имя</label>
                            <div class="col-sm-10">
                                <input name="name" type="text" class="form-control" id="nameform" placeholder="Имя">
                                <input type="hidden" name="scr" value="usrform">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ageform" class="col-sm-2 control-label">Дата рождения</label>
                            <div class="col-sm-10">
                                <input name="day" maxlength="2" type="text" class="form-control mystyle" id="ageform" placeholder="02 - день">
                                <input name="mounth" maxlength="2" type="text" class="form-control mystyle" id="ageform" placeholder="07 - месяц">
                                <input name="age" maxlength="4" type="text" class="form-control mystyle" id="ageform" placeholder="1987 - год">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descform" class="col-sm-2 control-label">О себе</label>
                            <div class="col-sm-10"><input  name="description"  type="text" class="form-control" id="descform" placeholder="пару слов о себе">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="photoform" class="col-sm-2 control-label">Фото</label>
                            <div class="col-sm-10"><input name="photo" type="file" class="form-control" accept="image/jpeg" id="photform" placeholder="фото">
                            </div>
                        </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Сохранить</button>
                </div>
            </div>
        </form>
    </div>

</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/main.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
