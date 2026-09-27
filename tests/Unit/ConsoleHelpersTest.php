<?php

namespace MedinaProduction\Toolkit\Tests\Unit;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\Artisan;
use MedinaProduction\Toolkit\Tests\Fixtures\ConsoleHelpersCommand;
use MedinaProduction\Toolkit\Tests\TestCase;

class ConsoleHelpersTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->app->make(Kernel::class)->registerCommand(new ConsoleHelpersCommand());
    }

    public function test_it_outputs_a_divider(): void
    {
        $this->artisan('toolkit:test divider')
            ->expectsOutputToContain(str_repeat('=', 120))
            ->assertSuccessful();
    }

    public function test_it_outputs_a_tree(): void
    {
        // The tree writes keys and values separately, so check the full output.
        Artisan::call('toolkit:test', ['helper' => 'tree']);

        $this->assertSame(implode(PHP_EOL, [
            '└ "name" => "Perdita"',
            '└ "active" => true',
            '└ "tags" ',
            '  └ 0 => "small"',
        ]) . PHP_EOL, Artisan::output());
    }
}
