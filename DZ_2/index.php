<?php
require 'functions.php';
$arr = ['интересные', 'домашние', 'задания', 'на курсе'];
echo '<p>Задание 1 :</p>';
echo task1($arr, true);
echo '<br><hr>';
echo '<p>Задание 2 :</p>';
$num_arr = [1, 2];
echo task2($num_arr, '+');
echo '<br><hr>';