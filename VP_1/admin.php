<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Страница заказов</title>
  </head>
  <body>
  <?php
  try {
      $pdo = new PDO('mysql:host=localhost;dbname=vp1;charset=utf8', 'root', '');
      $BD_data = $pdo->query("SELECT Users.id as ID, Users.name as Name, Users.email as E_mail, Orders.streets 
      as Street, Orders.house as Building, Orders.flat as Flat, Orders.floors as Floor, Orders.needChang as 
      Change_or_Card, Orders.callback as Callback, Orders.comments as Comment FROM Users
      INNER JOIN Orders ON Users.id = Orders.idUsers");
      $res = $BD_data->FETCHALL(PDO::FETCH_ASSOC);
      echo '<table border="1" style = "text-align:center">';
      echo 'Список пользователей и заказов:' .'<br>' .'<br>';
      foreach ($res as $val) {
          echo '<tr>';
          foreach ($val as $key => $item) {
              echo '<th>' . $key . '</th>';
              echo '<td>' . $item . '</td>';
          }
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
  </body>
</html>
