<?php

namespace MedinaProduction\Toolkit\Tests\Fixtures;

use Illuminate\Console\Command;
use MedinaProduction\Toolkit\Console\Traits\DividerHelper;
use MedinaProduction\Toolkit\Console\Traits\TreeHelper;

class ConsoleHelpersCommand extends Command
{
    use DividerHelper, TreeHelper;

    protected $signature = 'toolkit:test {helper}';

    public function handle(): int
    {
        match ($this->argument('helper')) {
            'divider' => $this->outputDivider(),
            'tree' => $this->displayTree([
                'name' => 'Perdita',
                'active' => true,
                'tags' => collect(['small']),
            ]),
        };

        return self::SUCCESS;
    }
}
