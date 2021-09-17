<?php

namespace Homework6\Command\Button;

class Cut extends Button
{
    public function click()
    {
        echo '- кнопка "Cut"' . PHP_EOL;
        parent::click();
    }
}
