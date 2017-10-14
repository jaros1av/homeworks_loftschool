<?php
require 'functions.php';
$arr = ['интересные', 'домашние', 'задания', 'на курсе'];
echo '<p>Задание 1 :</p>';
echo task1($arr, true);
echo '<br><hr>';
echo '<p>Задание 2 :</p>';
$num_arr = [1, 4, 7, 4, 5];
echo task2($num_arr, 'hhh');
echo '<br><hr>';
echo '<p>Задание 3 :</p>';
echo task3('hhh', 1, 2.5, 3.9);
echo '<br><hr>';
