<?php

namespace Homework6\Command\Command;

class Paste extends Command
{
    public function execute()
    {
        echo '- команда "Paste"' . PHP_EOL;
        $this->editor->paste();
    }
}
