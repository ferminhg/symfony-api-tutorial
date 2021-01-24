<?php

declare(strict_types=1);

namespace Devaway\Tests;

use Mockery\Adapter\Phpunit\MockeryTestCase;

final class IntegerTest extends MockeryTestCase
{
    public function test_number_should_by_integer(): void
    {
        $this->assertIsInt(1);
    }
}
