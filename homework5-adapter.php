<?php
/*
 * Реализовать паттерн Адаптер для связи внешней библиотеки (классы SquareAreaLib и CircleAreaLib)
 * вычисления площади квадрата (getSquareArea) и площади круга (getCircleArea) с интерфейсами
 * ISquare и ICircle имеющегося кода. Примеры классов даны ниже.
 * Причём во внешней библиотеке используются для расчётов формулы нахождения через диагонали фигур,
 * а в интерфейсах квадрата и круга — формулы, принимающие значения одной стороны и длины окружности соответственно.
 */

require 'vendor/autoload.php';

use Homework5\Adapter\CircleArea;
use Homework5\Adapter\CircleAreaAdapter;
use Homework5\Adapter\OuterLib\CircleAreaLib;
use Homework5\Adapter\OuterLib\SquareAreaLib;
use Homework5\Adapter\SquareArea;
use Homework5\Adapter\SquareAreaAdapter;

$separator = '***********************************' . PHP_EOL;

echo $separator;
echo 'Используем "родные" классы:' . PHP_EOL;
$circle = new CircleArea();
$square = new SquareArea();
echo 'Площадь круга: ' . $circle->circleArea(2) . PHP_EOL;
echo 'Площадь квадрата: ' . $square->squareArea(2) . PHP_EOL;
echo $separator;
echo 'Используем внешние классы через адаптер:' . PHP_EOL;
$outer_circle   = new CircleAreaLib();
$outer_square   = new SquareAreaLib();
$circle_adapter = new CircleAreaAdapter($outer_circle);
$square_adapter = new SquareAreaAdapter($outer_square);
echo 'Площадь круга: ' . $circle_adapter->circleArea(2) . PHP_EOL;
echo 'Площадь квадрата: ' . $square_adapter->squareArea(2) . PHP_EOL;
echo $separator;
