<?php

namespace Homework6\Command\Button;

class Undo extends Button
{
    public function click()
    {
        echo '- кнопка "Undo"' . PHP_EOL;
        parent::click();
    }
}
