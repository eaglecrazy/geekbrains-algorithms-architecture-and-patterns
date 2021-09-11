<?php

namespace Homework4\MySql;

use Homework4\AConnection;

class Connection extends AConnection
{
    /**
     * @inheritDoc
     */
    public function connect(string $user, string $password): bool
    {
        $this->status = true;
        echo 'MySql connected' . PHP_EOL;
        return true;
    }

    /**
     * @inheritDoc
     */
    public function disconnect(): bool
    {
        $this->status = false;
        echo 'MySql disconnected' . PHP_EOL;
        return true;
    }
}
