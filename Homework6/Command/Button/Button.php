<?php

namespace Homework6\Command\Button;

use Homework6\Command\Command\Command;

abstract class Button
{
    protected array $commands = [];

    public function setCommand(Command $command)
    {
        $this->commands[] = $command;
    }

    public function click()
    {
        foreach ($this->commands as $command) {
            $command->execute();
        }
    }
}
