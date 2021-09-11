<?php

namespace Homework4;

abstract class AConnection
{
    protected bool $status = false;

    /**
     * @param string $user
     * @param string $password
     * @return bool
     */
    abstract public function connect(string $user, string $password): bool;

    /**
     * @return bool
     */
    abstract public function disconnect(): bool;

    /**
     *
     */
    public function status(): void
    {
        $status = $this->status ? 'connected' : 'not connected';
        echo 'status: ' . $status . PHP_EOL;
    }
}
