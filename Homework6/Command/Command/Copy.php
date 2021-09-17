<?php

namespace Homework6\Command\Command;

class Copy extends Command
{
    public function execute()
    {
        echo '- команда "Copy"' . PHP_EOL;
        $this->editor->copySelected();
    }
}