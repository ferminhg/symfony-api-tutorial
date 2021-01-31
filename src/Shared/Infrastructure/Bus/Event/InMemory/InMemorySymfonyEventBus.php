<?php

declare(strict_types=1);

namespace Devaway\Shared\Infrastructure\Bus\Event\InMemory;

use Devaway\Shared\Domain\Bus\Event\DomainEvent;
use Devaway\Shared\Domain\Bus\Event\EventBus;
use Devaway\Shared\Infrastructure\Bus\CallableFirstParameterExtractor;
use Symfony\Component\Messenger\Exception\NoHandlerForMessageException;
use Symfony\Component\Messenger\Handler\HandlersLocator;
use Symfony\Component\Messenger\MessageBus;
use Symfony\Component\Messenger\Middleware\HandleMessageMiddleware;

final class InMemorySymfonyEventBus implements EventBus
{
    private MessageBus $bus;

    public function __construct(iterable $subscribers = [])
    {
        $this->bus = new MessageBus(
            [
                new HandleMessageMiddleware(
                    new HandlersLocator(
                        CallableFirstParameterExtractor::forPipedCallables($subscribers)
                    )
                ),
            ]
        );
    }

    public function publish(DomainEvent ...$events): void
    {
        foreach ($events as $event) {
            try {
                $this->bus->dispatch($event);
            } catch (NoHandlerForMessageException) {
            }
        }
    }
}