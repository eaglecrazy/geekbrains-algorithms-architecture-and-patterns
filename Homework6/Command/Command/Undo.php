<?php

namespace Homework6\Command\Command;

class Undo extends Command
{
    public function execute()
    {
        echo '- команда "Undo"' . PHP_EOL;
        $this->editor->undo();
    }
}
