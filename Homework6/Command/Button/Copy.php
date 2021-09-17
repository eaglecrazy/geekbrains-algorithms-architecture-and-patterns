<?php

namespace Homework6\Command\Button;

class Copy extends Button
{
    public function click()
    {
        echo '- кнопка "Copy"' . PHP_EOL;
        parent::click();
    }
}
