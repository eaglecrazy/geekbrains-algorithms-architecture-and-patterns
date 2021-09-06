<?php

namespace Homework4\PostgreSql;

use Homework4\Connection as AConnection;

class Connection extends AConnection
{
    /**
     * @inheritDoc
     */
    public function connect(string $user, string $password): bool
    {
        $this->status = true;
        echo 'PostgreSql connected' . PHP_EOL;
        return true;
    }

    /**
     * @inheritDoc
     */
    public function disconnect(): bool
    {
        $this->status = false;
        echo 'PostgreSql disconnected' . PHP_EOL;
        return true;
    }
}
