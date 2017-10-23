<?php
function task1()
{
    $xml = simplexml_load_file('data.xml');
    $items = $xml->xpath("//Item");
    $address_info = $xml->xpath("//Address");
    $detail_info = $xml->xpath("//DeliveryNotes");
    $order = $xml->attributes(); // получение атрибута корневого элемента (или $xml['PurchaseOrderNumber'] итп)
    echo '<p>Таблица Заказов: </p>';
    echo '<table border="1" style = "text-align:center">';
    echo '<tr><th>OrderNumber: ' . $order[0] . '</th><th>OrderDate: ' . $order[1] . '</th><tr>';
    for ($i = 0, $j = 0; $i < count($items), $j < count($address_info); $i++, $j++) {
        echo '<tr>';
        echo '<th>' . 'PartNumber: ' . $items[$i]['PartNumber'] . '</th>';
        foreach ($items[$i] as $key => $item) {
            echo '<td>' . $key . ' : ' . $item . '</td>';
        }
        echo '</tr>';
        echo '<tr>';
        echo '<td>' . 'Address type: ' . $address_info [$j]['Type'] . '</td>';
        foreach ($address_info[$j] as $key => $addr) {
            echo '<td>' . $key . ' : ' . $addr . '</td>';
        }
        echo '</tr>';
    }
    echo '<tr><th>DeliveryNotes: ' . '</th>' . '<td>' . $detail_info[0] . '</td></tr>';
    echo '</table>';
}

//Задание 2
function task2()
{
    $arr = array(array(1, 2, 3, 4, 5, 6, 7), array(9, 8, 6, 4, 2), array('a', 'b', 'c'));
    $arr_json = json_encode($arr);
    $handle = fopen('output.json', "w+");
    fwrite($handle, $arr_json);
    fclose($handle);
    $arr_2 = array(array(1, 22, 3, 4444, 5, 6768, 7), array(1111, 8, 6, 4, 2), array("v", "g", "c"));
    $arr_2_json = json_encode($arr_2);
    $handle = fopen('output2.json', "w+");
    fwrite($handle, $arr_2_json);
    fclose($handle);
    $output = file_get_contents('output.json');
    $output = json_decode($output, true);
    $output2 = file_get_contents('output2.json');
    $output2 = json_decode($output2, true);
    echo '<p>В массивах output и output2 были найдены следующие различия в значениях элементов: ' . '<br>';
    for ($i = 0, $j = 0; $i < count($output), $j < count($output2); $i++, $j++) {
        for ($ii = 0, $jj = 0; $ii < count($output[$i]), $jj < count($output2[$j]); $ii++, $jj++) {
            if ($output[$i][$ii] != $output2[$j][$jj]) {
                echo $output[$i][$ii] . ' - ' . $output2[$j][$jj] . '<br>';
            }
        }
    }
}

//Задание 3
function task3()
{
    $handle = fopen('ex3.csv', "w");
    for ($i = 1; $i <= 100; $i++) {
        $arr[$i] = rand(1, 100);
    }
    fputcsv($handle, $arr);
    fclose($handle);
    $handle_csv = fopen('ex3.csv', "r");
    $csv = fgetcsv($handle_csv, 0, ",");
    foreach ($csv as $num) {
        if ($num % 2 == 0) {
//            echo $num . ' ';
            $even[] = $num;
        }
    }
    $res_even = array_sum($even);
    echo 'Сумма четных элементов массива csv раняется = ';
    echo $res_even;
}

//Задание 4
function task4()
{
    if (file_exists("ex4.json")) {
        $json = file_get_contents("ex4.json", "r");
        $json = json_decode($json, true);
        echo 'PageId: ' . $json['query']['pages']['15580374']['pageid'];
        echo '<br>';
        echo 'Title: ' . $json['query']['pages']['15580374']['title'];
    } else {
        $ch = curl_init("https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json");
        $fp = fopen("ex4.json", "w+");
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);
        echo 'Файл записан!' . '<br>';
        $json = file_get_contents("ex4.json", "r");
        $json = json_decode($json, true);
        echo 'PageId: ' . $json['query']['pages']['15580374']['pageid'];
        echo '<br>';
        echo 'Title: ' . $json['query']['pages']['15580374']['title'];
    }
}
