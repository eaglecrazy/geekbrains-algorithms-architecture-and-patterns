<?php

namespace Homework5\Decorator;

interface Notifier
{
    /**
     * @param string $notification
     * @param array $recipients
     */
    public function notify(string $notification, array $recipients = []): void;
}
