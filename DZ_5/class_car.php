<?php
//
//trait engine
//{
//    public function en($speed, $direction)
//    {
//        if ($speed <= 20 && $direction == 'вперед') {
//            echo 'Включена первая передача';
//        }
//    }
//}
class Engine
{
    public static $temp = 0;

    public function setOrCoolTemp($count_move)
    {
        if ($count_move == 10) {
            self::$temp += $count_move;
            if (self::$temp >=90){
//                echo 'текущая температура двигателя' . self::$temp;
                echo 'была вкючена система охлаждения';
                self::$temp -= 5;
            }
        }
        return self::$temp;
    }

//    public function cooling()
//    {
//        if(self::$temp >=90){
//            echo 'Включена система охлаждения';
//            self::$temp -= 5;
//            return self::$temp;
//        }
//    }
}
class Car extends Engine
{
    public $distance;
    public $speed;
    public $direction;
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
//            echo self::$count_move .'<br>';
            if(self::$count_move == 10){
                echo $this->setOrCoolTemp(self::$count_move);
                self::$count_move = 0;
            }
            self::$count_move++;
//            echo $this->cooling();
        }
    }

}
class Niva extends Car
{
    public $model ="Niva";
}

$niva = new Niva();
$niva->move(120, 10, 'вперед');
