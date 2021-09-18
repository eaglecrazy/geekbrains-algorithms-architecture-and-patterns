<?php

namespace Homework6\Strategy\PaymentStrategy;

class Webmoney implements PaymentStrategy
{
    public function Pay(int $amount)
    {
        echo 'Payment by webmoney. Amount = ' . $amount . PHP_EOL;
    }
}