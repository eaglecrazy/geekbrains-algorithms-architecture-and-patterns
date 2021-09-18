<?php

namespace Homework6\Observer;

class Vacancy
{
    private string $position;
    private int    $salary;

    public function __construct(string $position, int $salary)
    {
        $this->position = $position;
        $this->salary   = $salary;
    }

    public function getPosition(): string
    {
        return $this->position;
    }

    public function getSalary(): int
    {
        return $this->salary;
    }

}
