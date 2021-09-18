<?php

namespace Homework6\Strategy;

class Order
{
    static private int $new_id = 1;
    private Item       $item;
    private int        $count;
    private string     $paymentMethod;
    public int         $id;

    public function __construct(Item $item, int $count, string $paymentMethod)
    {
        $this->item          = $item;
        $this->count         = $count;
        $this->paymentMethod = $paymentMethod;
        $this->id            = self::$new_id++;
    }

    public function getAmount(): int
    {
        return $this->item->cost * $this->count;
    }

    public function getPaymentMethod(): string
    {
        return $this->paymentMethod;
    }
}
