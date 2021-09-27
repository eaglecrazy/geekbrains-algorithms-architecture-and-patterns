<?php
//Написать аналог «Проводника» в Windows для директорий на сервере при помощи итераторов.

session_start();

if (empty($_SESSION['current'])) {
    $_SESSION['current'] = __DIR__;
}

$current = $_SESSION['current'];

$path = $_GET['path'] ?? '';

$new = $current . '/' . $path;

if (is_file($new)) {
    echo 'It is file.<br>' . $new . '<br>';
    echo '<a href="' . $current . '">back</a><br>';
    die();
}

$_SESSION['current'] = show_dir($new);

function show_dir(string $dir): string
{
    $i = new DirectoryIterator($dir);

    $realPath = $i->getRealPath();

    echo $realPath;
    echo '<br>------------------------------------------------------------------------------------------------------------------------------------<br>';

    while ($i->valid()) {
        echo '<a href="?path=' . $i->current() . '">' . $i->current() . '</a><br>';
        $i->next();
    }

    return $realPath;
}

