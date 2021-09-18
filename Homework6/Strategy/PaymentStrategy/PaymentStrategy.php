<?php

namespace Homework6\Strategy\PaymentStrategy;

interface PaymentStrategy
{
    public function Pay(int $amount);
}
