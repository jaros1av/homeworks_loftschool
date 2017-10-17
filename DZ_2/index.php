<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>multiplication table</title>

<?php
require 'functions.php';
$arr = ['интересные', 'домашние', 'задания', 'на курсе'];
echo '<p>Задание 1 :</p>';
echo task1($arr, true);
echo '<br><hr>';
echo '<p>Задание 2 :</p>';
$num_arr = [1, 4, 7, 4, 5];
echo task2($num_arr, '-');
echo '<br><hr>';
echo '<p>Задание 3 :</p>';
echo task3('+', 1, 2.5, 3.9);
echo '<br><hr>';
echo '<p>Задание 4 :</p>';
echo task4(9, 9);
echo '<br><hr>';
echo '<p>Задание 5 :</p>';
//echo task5 ('Topot');
//echo '<br><hr>';
//echo $ret('Топот');
//echo '<br><hr>';
echo task5('топот');
$ret (топот);
