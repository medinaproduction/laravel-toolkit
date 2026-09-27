<?php

namespace MedinaProduction\Toolkit\Tests\Unit;

use MedinaProduction\Toolkit\Tests\TestCase;

class ServiceProviderTest extends TestCase
{
    public function test_it_merges_the_config(): void
    {
        $this->assertSame([], config('toolkit'));
    }
}
