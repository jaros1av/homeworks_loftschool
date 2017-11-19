<?php

trait engine
{
    public function en($speed, $direction)
    {
        if ($speed <= 20 && $direction == 'вперед') {
            echo 'Включена первая передача';
        }
    }
}
class Car
{
    public $distance;
    public $speed;
    public $direction;
    public $en_temp = 0;
    public static $count_move = 0;
//    public $transmission;
//    use engine;

    public function move(int $distance = 0, int $speed = 0, string $direction = 'Направление не задано')
    {
        $this->$distance = $distance;
        $this->$speed = $speed;
        $this->$direction = $direction;
        echo 'Параметры движения: ' . '<br/>';
        echo 'Расстояние: ' . $distance . ' м' . '</br>' . 'Скорость: ' . $speed . ' м/с' . '<br/>' . 'Направление: ' . $direction;
        echo '<hr>';
        for ($s = $speed; $s <= $distance; $s ++) {
//            for ($s = $speed; $s <= $distance; $s ++) {
            echo 'проехал ' . $s . ' м' . '<br>';
            echo self::$count_move .'<br>';
            self::$count_move++;
            if(self::$count_move == 10){
                $this->$en_temp = 10;
            }
        }
       echo $this->en_temp;
    }

//        for ($s = $speed; $s <= $distance; $s += $speed) {
//        for ($s = $speed; $s <= $distance; $s ++) {
//            echo 'проехал ' . $s . ' м' . '<br>';
//        }

}
class Niva extends Car
{
    public $model ="Niva";
}

$niva = new Niva();
$niva->move(20, 14, 'вперед');
