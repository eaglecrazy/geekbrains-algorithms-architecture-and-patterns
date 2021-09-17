<?php

namespace Homework6\Command\Button;

class Redo extends Button
{
    public function click()
    {
        echo '- кнопка "Redo"' . PHP_EOL;
        parent::click();
    }
}
