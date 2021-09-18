<?php

namespace Homework6\Strategy;


use Homework6\Strategy\PaymentStrategy\Card;
use Homework6\Strategy\PaymentStrategy\Qiwi;
use Homework6\Strategy\PaymentStrategy\Webmoney;

class Shop
{
    const PAYMENT_CARD     = Card::class;
    const PAYMENT_WEBMONEY = Webmoney::class;
    const PAYMENT_QIWI     = Qiwi::class;

    private array $orders;

    public function addOrder(Item $item, int $count, string $paymentMethod): int
    {
        $order                    = new Order($item, $count, $paymentMethod);
        $this->orders[$order->id] = $order;
        return $order->id;
    }

    public function pay(int $id): void
    {
        /** @var Order $order */
        $order         = $this->orders[$id];
        $paymentMethod = $order->getPaymentMethod();

        $payment = new Payment($order->getAmount(), new $paymentMethod());
        $payment->pay();
    }
}
