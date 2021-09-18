<?php

namespace Homework6\Strategy;

use Homework6\Strategy\PaymentStrategy\PaymentStrategy;

class Payment
{
    private int             $amount;
    private PaymentStrategy $paymentType;

    public function __construct(int $amount, PaymentStrategy $paymentType)
    {
        $this->amount      = $amount;
        $this->paymentType = $paymentType;
    }

    public function setPaymentType(PaymentStrategy $paymentType): void
    {
        $this->paymentType = $paymentType;
    }

    public function pay()
    {
        $this->paymentType->Pay($this->amount);
    }
}
