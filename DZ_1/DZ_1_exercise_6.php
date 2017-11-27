<?php
$bmw = ['model' => 'X5', 'speed' => '120', 'doors' => '5', 'year' => '2015'];
$toyota = ['model' => 'Corolla(E170)', 'speed' => '180', 'doors' => '4', 'year' => '2015'];
$opel = ['model' => 'Astra', 'speed' => '203', 'doors' => '4', 'year' => '2012'];
$cars = ["BMW"=>$bmw, "Toyota"=>$toyota, "Opel"=>$opel];
//echo "<pre>";
//print_r($cars);
//echo "</pre>";
//$cars1 =  array_merge_recursive($bmw, $toyota, $opel);
//echo "<pre>";
//print_r($cars2);
//echo "</pre>";
//$counts = count($cars);
//for ($i = 0; $i < $counts; $i++) {
//    echo '<p style ="border:1px solid black">' . $cars[$i]['name'] . '<br>' . $cars[$i]['model'] . ' - ' .
//        $cars[$i]['speed'] . ' - ' . $cars[$i]['doors'] . ' - ' . $cars[$i]['year'] . '</p>';
//}

foreach ($cars as $car => $items) {
    echo '<p style ="border:1px solid black">'. 'CAR ' . $car . '<br>';
    foreach ($items as $item) {
        echo '-'.$item;
    }
    echo '</p>';
}
/**
 * как лучше объединять массивы, через array_merge_recursive или как было сделано здесь? Просто array_merge заменяет
 * значения из схожих ключей, то есть на выходе получим один массив $opel
 */