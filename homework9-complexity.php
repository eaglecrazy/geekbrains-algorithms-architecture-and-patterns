<?php
//Написать аналог «Проводника» в Windows для директорий на сервере при помощи итераторов.

$iterator = new DirectoryIterator(__DIR__);

var_dump($iterator);
