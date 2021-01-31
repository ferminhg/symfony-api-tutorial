<?php

declare(strict_types=1);

namespace Devaway\ToDoList\Domain;


interface ListRepository
{
    public function save(ItemList $item): void;

   //public function searchByCriteria(Criteria $criteria): Items;
}
