<?php

namespace Homework6\Strategy\PaymentStrategy;

class Card implements PaymentStrategy
{
    public function Pay(int $amount)
    {
        echo 'Payment by card. Amount = ' . $amount . PHP_EOL;
    }
}
