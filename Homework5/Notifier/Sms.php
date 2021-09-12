<?php

namespace Homework5\Notifier;

use Homework5\NotifierDecorator;

class Sms extends NotifierDecorator
{
    /**
     * @param string $notification
     * @param array $recipients
     */
    public function notify(string $notification, array $recipients = []): void
    {
        parent::notify($notification, $recipients);

        foreach ($recipients[static::class] as $recipient) {
            echo 'Send Sms notification: ' . $notification . ' to ' . $recipient . PHP_EOL;
        }
    }
}
