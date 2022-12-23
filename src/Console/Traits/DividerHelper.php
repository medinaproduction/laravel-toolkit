<?php

namespace MedinaProduction\Toolkit\Console\Traits;

use Illuminate\Support\Str;

trait DividerHelper
{
    public function outputDivider(string $character = '=', int $width = 120, $color = 'yellow'): void
    {
        $divider = Str::repeat($character, $width);

        $divider = '<fg=' . $color . '>' . $divider . '</>';

        $this->output->writeln($divider);
    }
}
