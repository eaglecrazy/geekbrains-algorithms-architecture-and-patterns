<?php

/*
 * Стратегия: есть интернет-магазин по продаже носков.
 * Необходимо реализовать возможность оплаты различными способами (Qiwi, Яндекс, WebMoney).
 * Разница лишь в обработке запроса на оплату и получение ответа от платёжной системы.
 * В интерфейсе функции оплаты достаточно общей суммы товара и номера телефона.
 */

require 'vendor/autoload.php';

use Homework6\Strategy\Item;
use Homework6\Strategy\Shop;

$items = [
    'red'   => new Item('red socks', 10),
    'green' => new Item('green socks', 20),
    'blue'  => new Item('blue socks', 30),
];

$shop  = new Shop();

$cardOrderId     = $shop->addOrder($items['red'], 1, Shop::PAYMENT_CARD);
$quwiOrderId     = $shop->addOrder($items['green'], 2, Shop::PAYMENT_QIWI);
$webmoneyOrderId = $shop->addOrder($items['blue'], 3, Shop::PAYMENT_WEBMONEY);

$shop->pay($cardOrderId);
$shop->pay($quwiOrderId);
$shop->pay($webmoneyOrderId);