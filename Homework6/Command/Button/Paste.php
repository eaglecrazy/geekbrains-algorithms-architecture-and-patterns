<?php

namespace Homework6\Command\Button;

class Paste extends Button
{
    public function click()
    {
        echo '- кнопка "Paste"' . PHP_EOL;
        parent::click();
    }
}
