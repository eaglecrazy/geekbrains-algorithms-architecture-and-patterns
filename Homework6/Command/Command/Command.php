<?php

namespace Homework6\Command\Command;

use Homework6\Command\Editor;

abstract class Command
{
    protected Editor $editor;

    public function __construct(Editor $editor)
    {
        $this->editor = $editor;
    }

    abstract public function execute();
}
