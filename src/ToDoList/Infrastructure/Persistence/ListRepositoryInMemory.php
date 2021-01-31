<?php

declare(strict_types=1);

namespace Devaway\ToDoList\Infrastructure\Persistence;

use Devaway\ToDoList\Domain\ItemList;
use Devaway\ToDoList\Domain\ListRepository;
use Doctrine\Common\Collections\ArrayCollection;
use function Lambdish\Phunctional\all;

final class ListRepositoryInMemory implements ListRepository
{
    private ArrayCollection $list;

    public function __construct(iterable $list = [])
    {
        if (! all(
            function ($item) {
                return ItemList::class == $item::class;
            },
            $list
            )) {
            $list = [];
        }
        $this->list = new ArrayCollection($list);
    }

    public function save(ItemList $item): void
    {
        $this->list->add($item);
    }
}
