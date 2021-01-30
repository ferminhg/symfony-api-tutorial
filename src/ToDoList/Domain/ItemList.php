<?php

declare(strict_types=1);

namespace Devaway\ToDoList\Domain;

use Devaway\Shared\Domain\AggregateRoot;

final class ItemList extends AggregateRoot
{
    private bool $isChecked;

    /**
     * ItemList constructor.
     * @param ItemName $name
     */
    private function __construct(public ItemName $name)
    {
        $this->isChecked = false;
    }

    /**
     * @param ItemName $name
     * @return static
     */
    public static function create(ItemName $name): self
    {
        return new self($name);
    }

    /**
     * @return bool
     */
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
