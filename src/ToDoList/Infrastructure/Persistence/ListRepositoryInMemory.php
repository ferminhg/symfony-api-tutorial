<?php

declare(strict_types=1);

namespace Devaway\ToDoList\Infrastructure\Persistence;


use Devaway\ToDoList\Domain\ItemList;
use Devaway\ToDoList\Domain\ListRepository;
use Doctrine\Common\Collections\Collection;

final class ListRepositoryInMemory implements ListRepository
{
    public function __construct(private Collection $list)
    {
    }

    public function save(ItemList $item): void
    {
        $this->list->add($item);
    }
}
