<?php

namespace MedinaProduction\Toolkit\Console\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

trait TreeHelper
{
    public function displayTree(Collection|array $treeBranch, int $level = 0, string $keyAddon = ''): void
    {
        $treeBranch = $this->ensureIsCollection($treeBranch);

        $treeBranch
            ->each(function ($value, $key) use ($level, $treeBranch, $keyAddon) {
                $value = $this->convertCollectionsToArray($value);

                // Prepare spaces for the hierarchy
                $spaces = str_pad('', $level * 2, " ");;

                if (is_array($value) || $value instanceof Collection) {
                    $this->writeKey($level, $key, $keyAddon);
                    $this->output->newLine();
                    $this->displayTree($value, $level + 1);
                } else if ($value instanceof Model) {
                    $keyAddon = get_class($value);
                    $this->writeKey($level, $key, $keyAddon);
                    $this->output->newLine();
                    $this->displayTree($value->toArray(), $level + 1);
                } else {
                    $this->writeKey($level, $key, $keyAddon);
                    $this->writeValue($value);
                    $this->output->newLine();
                }
            });
    }

    private function writeValue(mixed $value)
    {
        if ($value instanceof Carbon) {
            $value = (string) $value;
        }

        $value = match (gettype($value)) {
            'boolean' => $value ? 'true' : 'false',
            'string' => '"' . $value  . '"',
            default => $value,
        };

        $this->output->write('<fg=cyan>=></> <fg=green>' . $value . '</>');
    }

    private function ensureIsCollection(Collection|array $treeBranch): Collection
    {
        if (is_array($treeBranch)) {
            return collect($treeBranch);
        }

        return $treeBranch;
    }

    private function convertCollectionsToArray(mixed $value): mixed
    {
        if ($value instanceof Collection) {
            return $value->toArray();
        }

        return $value;
    }

    function writeKey(int $level, $key, $keyAddon): void
    {
        $spaces = str_pad('', $level * 2, " ");;


        $key = match (gettype($key)) {
            'string' => '"' . $key  . '"',
            default => $key,
        };

        $this->output->write($spaces . '<fg=cyan>└</> <fg=yellow>' . $key . '</> ');

        if ($keyAddon) {
            $this->output->write($spaces . ' <fg=blue>' . $keyAddon . '</> ');
        }
    }
}
