<?php

declare(strict_types=1);

namespace Devaway\ToDoList\Domain;

use Devaway\Shared\Domain\AggregateRoot;

final class ItemList extends AggregateRoot
{
    private bool $isChecked;

    private function __construct(public ItemName $name)
    {
        $this->isChecked = false;
    }

    public static function create(ItemName $name): self
    {
        return new self($name);
    }

    public function isChecked(): bool
    {
        return $this->isChecked;
    }

    public function check(): void
    {
        $this->isChecked = true;
    }

    public function uncheck(): void
    {
        $this->isChecked = false;
    }
}
