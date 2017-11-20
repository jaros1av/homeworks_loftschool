<?php

class Engine
{
    public static $temp = 0;

    public function setOrCoolTemp($count_move)
    {
//        echo $count_move;
        self::$temp += $count_move;
        if (self::$temp >= 90) {
            echo 'текущая температура двигателя ' . self::$temp . '<br>';
            echo 'была вкючена система охлаждения, ';
            self::$temp -= 5;
//            echo 'температура двигателя: ' . self::$temp . '<br>';
        }
        return 'температура двигателя: ' . self::$temp . '<br>';
    }
}

trait Rmove
{
    public function R()
    {
        $this->speed = 15;
        return 'Движемся назад со скоростью ' . $this->speed . 'м/c';
    }
}

class Car extends Engine
{
    public $distance;
    public $speed;
    public $direction;
    public static $transmission;
    public $gear = NULL;
    public static $count_move = 0;
    use Rmove;

    public function move(int $distance = 0, int $speed = 0, string $direction = 'Направление не задано')
    {
        $this->$distance = $distance;
        $this->$speed = $speed;
        $this->$direction = $direction;
        echo 'Параметры движения: ' . '<br/>';
        echo 'Расстояние: ' . $distance . ' м' . '</br>' . 'Скорость: ' . $speed . ' м/с' . '<br/>' .
            'Направление: ' . $direction;
        echo '<hr>';
        if (self::$transmission === 'Механика' && $direction === 'вперед') {
            if (($this->$speed) <= 20) {
                $this->gear = 1;
            } else {
                $this->gear = 2;
            }
            echo 'Двигатель включен' . '<br>' . 'Включена пердача ' . $this->gear . '<br>' . 'Поехали!' . '<br>';
            for ($s = $speed; $s <= $distance; $s++) {
//            for ($s = $speed; $s <= $distance; s+= $speed) {
                echo 'проехал ' . $s . ' м' . '<br>';
//            echo self::$count_move .'<br>';
                if (self::$count_move == 10) {
                    echo $this->setOrCoolTemp(self::$count_move);
                    self::$count_move = 0;
                }
                self::$count_move++;
//            echo $this->cooling();
            }
            echo 'Поездка закончена, двигатель выключен';
        } elseif (self::$transmission === 'Автомат' && $direction === 'вперед') {
            echo 'Двигатель включен' . '<br>' . 'Поехали!' . '<br>';
            for ($s = $speed; $s <= $distance; $s++) {
//            for ($s = $speed; $s <= $distance; s+= $speed) {
                echo 'проехал ' . $s . ' м' . '<br>';
//            echo self::$count_move .'<br>';
                if (self::$count_move == 10) {
                    echo $this->setOrCoolTemp(self::$count_move);
                    self::$count_move = 0;
                }
                self::$count_move++;
            }
            echo 'Поездка закончена, двигатель выключен';
        } else {
            echo $this->R();
        }
    }

}

class Niva extends Car
{
    public $model;
    public $engine_type;

//    public static $transmission;
    public function __construct(string $model = "Нива 4х4", string $transmission = "Механика", string $engine_type = "Бензин")
    {
        $this->$model = $model;
        Car::$transmission = $transmission;
        $this->$engine_type = $engine_type;
        echo 'Марка: ' . $model . '<br>' . 'Тип трансмиссии: ' . $transmission . '<br>' .
            'Тип двигателя: ' . $engine_type . '<br> * * * <br>';
    }
}

$car = new Niva('Лада', 'Механика');
$car->move(190, 10, 'вперед');
