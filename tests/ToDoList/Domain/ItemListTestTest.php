<?php

declare(strict_types=1);

namespace Devaway\Tests\ToDoList\Domain;

use Mockery\Adapter\Phpunit\MockeryTestCase;

class ItemListTestTest extends MockeryTestCase
{
    public function test_create_valid_item():void
    {
        $item_list = ItemList::create("wopwop");

        $this->assertEquals("wopwop", $item_list->action);
        $this->assertIsBool($item_list->checked);
        $this->assertFalse($item_list->checked);
    }
}
