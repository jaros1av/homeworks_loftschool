<?php
require_once "vendor/autoload.php";
use Intervention\Image\ImageManagerStatic as Image;
putenv('GDFONTPATH=' . realpath('.'));
$image = Image::make('image/1.jpg')
//    ->resize(200, 200)
        ->resize(200,null, function ($image){ //с сохранением пропорции по высоте
            $image->aspectRatio();
    })
    ->rotate(45) // поворот на 45 градусов
        ->text('Задание № 4, ДЗ 6', 115, 120, function($font) {
        $font->file('arial.ttf');
        $font->size(20);
        $font->color('#000000');
        $font->align('center');
        $font->valign('top');
        $font->angle(45);
    })
    ->save('image/new1.jpg');
echo "Before: <br>";
echo "<img src='image/1.jpg' />";
echo "<br>";
echo "After: <br>";
echo "<img src='image/new1.jpg' />";