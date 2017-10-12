<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>multiplication table</title>
</head>
<body>
<?php
echo'<table border="1">';
for ($i = 1; $i <= 10; $i++) {
    echo '<tr>';
    for ($j = 1; $j <= 10; $j++) {
        if (($i == 1) || ($j == 1)) { // если первая строка или столбец, выводим без скобок
            echo '<th>' . ($i * $j) . '</th>';
        } elseif (($i * $j) % 2 == 0) { // если значение четное
            echo '<td>' . '(' . ($i * $j) . ')' . '</td>';
        } else {  // если значение не четное
            echo '<td>' . '[' . ($i * $j) . ']' . '</td>';
        }
    }
    echo '</tr>';
}
echo '</table>';
?>
</body>
</html>