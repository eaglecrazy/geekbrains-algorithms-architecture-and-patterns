<?php

namespace Homework6\Command\Command;

class Redo extends Command
{
    public function execute()
    {
        echo '- команда "Redo"' . PHP_EOL;
        $this->editor->redo();
    }
}
