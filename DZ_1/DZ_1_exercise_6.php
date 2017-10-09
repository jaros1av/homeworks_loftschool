<?php
$bmw = ['name' => 'BMW', 'model' => 'X5', 'speed' => '120', 'doors' => '5', 'year' => '2015'];
$toyota = ['name' => 'Toyota','model' => 'Corolla(E170)', 'speed' => '180', 'doors' => '4', 'year' => '2015'];
$opel = ['name' => 'Opel', 'model' => 'Astra', 'speed' => '203', 'doors' => '4', 'year' => '2012'];
$cars = [$bmw, $toyota, $opel];
//$cars1 =  array_merge_recursive($bmw, $toyota, $opel);
//echo "<pre>";
//print_r($cars2);
//echo "</pre>";
$counts = count($cars);
for ($i = 0; $i < $counts; $i++) {
    echo '<p style ="border:1px solid black">' . $cars[$i]['name'] . '<br>' . $cars[$i]['model'] . ' - ' .
        $cars[$i]['speed'] . ' - ' . $cars[$i]['doors'] . ' - ' . $cars[$i]['year'] . '</p>';
}
