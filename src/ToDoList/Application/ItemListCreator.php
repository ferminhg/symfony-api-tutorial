<?php

declare(strict_types=1);

namespace Devaway\ToDoList\Application;

use Devaway\Shared\Domain\Bus\Event\EventBus;
use Devaway\ToDoList\Domain\ItemList;
use Devaway\ToDoList\Domain\ItemName;
use Devaway\ToDoList\Domain\ListRepository;

final class ItemListCreator
{
    public function __construct(private ListRepository $repository, private EventBus $bus)
    {
    }

    public function create(ItemName $name): void
    {
        $item = ItemList::create($name);

        $this->repository->save($item);
        $this->bus->publish(...$item->pullDomainEvents());
    }
}
