<?php

declare(strict_types=1);

namespace Devaway\ToDoList\Infrastructure\Persistence;

use Devaway\ToDoList\Domain\ItemList;
use Devaway\ToDoList\Domain\ListRepository;
use Doctrine\Common\Collections\ArrayCollection;
use UnexpectedValueException;
use function Lambdish\Phunctional\all;
use function Lambdish\Phunctional\instance_of;

final class ListRepositoryInMemory implements ListRepository
{
    private ArrayCollection $list;

    public function __construct(iterable $list = [])
    {
        if(! all(instance_of(ItemList::class), $list)) {
            throw new UnexpectedValueException("Expected ". ItemList::class);
        }
        $this->list = new ArrayCollection($list);
    }

    public function save(ItemList $item): void
    {
        $this->list->add($item);
    }
}
