<?php

namespace Homework6\Command\Command;

class Cut extends Command
{
    public function execute()
    {
        echo '- команда "Cut"' . PHP_EOL;
        $this->editor->cutSelected();
    }
}
