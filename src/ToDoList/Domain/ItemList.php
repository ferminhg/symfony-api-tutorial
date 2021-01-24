<?php

declare(strict_types=1);

namespace Devaway\ToDoList\Domain;

use Devaway\Shared\Domain\AggregateRoot;

final class ItemList extends AggregateRoot
{
    /**
     * ItemList constructor.
     * @param ItemName $name
     */
    private function __construct(public ItemName $name)
    {
    }

    /**
     * @param ItemName $name
     * @return static
     */
    public static function create(ItemName $name): self
    {
        return new self($name);
    }
}