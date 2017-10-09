<?php
// assign random value to variable $age
$age = rand(1, 80);
if ($age >= 18 && $age <= 65) {
    echo 'Ваш возраст ' . $age . ' - Вам еще работать и работать';
} elseif ($age >= 1 && $age <= 17) {
    echo 'Ваш возраст ' . $age . ' - Вам еще рано работать';
} else {
    echo  'Ваш возраст ' . $age . ' - Вам пора на пенсию';
}