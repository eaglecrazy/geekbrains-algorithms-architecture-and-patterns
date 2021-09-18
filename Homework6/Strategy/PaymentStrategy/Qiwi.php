<?php

namespace Homework6\Strategy\PaymentStrategy;

class Qiwi implements PaymentStrategy
{
    public function Pay(int $amount)
    {
        echo 'Payment by qiwi. Amount = ' . $amount . PHP_EOL;
    }
}