<?php

declare(strict_types=1);

namespace Devaway\Tests\ToDoList\Domain;

use Devaway\ToDoList\Domain\ItemList;
use Devaway\ToDoList\Domain\ItemName;
use Mockery\Adapter\Phpunit\MockeryTestCase;

class ItemListTest extends MockeryTestCase
{
    public function test_create_valid_item():void
    {
        $item_name = new ItemName("wopwop");
        $item_list = ItemList::create($item_name);

        $this->assertEquals($item_name, $item_list->name);
        $this->assertFalse($item_list->isChecked());
    }
}
