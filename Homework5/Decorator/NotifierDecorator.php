<?php

namespace Homework5\Decorator;

abstract class NotifierDecorator implements Notifier
{
    // В методичке описан пример декоратора который обязательно имеет реализацию по умолчанию.
    // Это не гибкое решение, так как реализацией по умолчанию, допустим, может быть Email.
    // А уведомление, допустим, должно уйти только на Slack и SMS.
    // В моей реализации можно выбрать любое из семи сочетаний Email, Slack и SMS.

    private ?Notifier $notifier;

    /**
     * @param Notifier|null $notifier
     */
    public function __construct(Notifier $notifier = null)
    {
        $this->notifier = $notifier;
    }

    /**
     * @inheritDoc
     */
    public function notify(string $notification, array $recipients = []): void
    {
        if ($this->notifier) {
            $this->notifier->notify($notification, $recipients);
        }
    }
}
