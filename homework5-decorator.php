<?php
/*
 * Реализовать на PHP пример Декоратора, позволяющий отправлять уведомления несколькими различными способами.
 */
require 'vendor/autoload.php';

use Homework5\Decorator\Notifier\Email;
use Homework5\Decorator\Notifier\Slack;
use Homework5\Decorator\Notifier\Sms;

$separator = '***********************************' . PHP_EOL;

$message = 'Hello world!';
$recipients = [
    Email::class => ['test@yandex.ru', 'test@mail.ru'],
    Sms::class   => ['+79211234567', '+79117654321'],
    Slack::class => ['slack-account-1', 'slack-account-2'],
];

echo $separator;
$agile_notifier = new Email();
$agile_notifier->notify($message, $recipients);
echo $separator;
$agile_notifier = new Sms($agile_notifier);
$agile_notifier->notify($message, $recipients);
echo $separator;
$agile_notifier = new Slack($agile_notifier);
$agile_notifier->notify($message, $recipients);