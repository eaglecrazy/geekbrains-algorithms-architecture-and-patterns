<?php

namespace Homework6\Observer;

use SplObserver;
use SplSubject;

abstract class Person implements SplObserver, Jobless
{
    const PROFESSION = null;

    private string $email;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function getProfession(): string
    {
        return strtolower(static::PROFESSION);
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function update(SplSubject $subject)
    {
        echo 'Notification received : ' . $this->getProfession() . PHP_EOL;
    }
}
