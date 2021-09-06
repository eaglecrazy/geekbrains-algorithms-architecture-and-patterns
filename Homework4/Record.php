<?php

namespace Homework4;

abstract class Record
{
    protected string $entity;
    protected string $number;

    /**
     * @param string $entity
     * @param int $number
     */
    public function __construct(string $entity, int $number)
    {
        $this->entity = $entity;
        $this->number = $number;
    }

    /**
     *
     */
    abstract public function printData(): void;
}
