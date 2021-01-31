<?php

declare(strict_types=1);

namespace Devaway\Domain\Bus\Event;

use DateTimeImmutable;
use Devaway\Shared\Domain\Utils;
use Devaway\Shared\Domain\ValueObject\Uuid;

abstract class DomainEvent
{
    private string $eventId;
    private string $occurredOn;

    public function __construct(private string $aggregateId, string $eventId = null, string $occurredOn = null)
    {
        $this->eventId    = $eventId ?: Uuid::random()->value();
        $this->occurredOn = $occurredOn ?: Utils::dateToString(new DateTimeImmutable());
    }

    abstract public static function fromPrimitives(
        string $aggregateId,
        array $body,
        string $eventId,
        string $occurredOn
    ): self;
}
