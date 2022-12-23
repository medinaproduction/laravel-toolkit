<?php

namespace MedinaProduction\Toolkit\Services;

class Timer
{
    protected array $timers;

    /**
     * Sets the timer with the specified name.
     */
    public function start(string $name): void
    {
        $this->timers[$name]['start'] = microtime(true);
        $this->timers[$name]['count'] = isset($this->timers[$name]['count']) ? ++$this->timers[$name]['count'] : 1;
    }

    /**
     * Reads the timer current time without stopping it.
     */
    public function read(string $name): float
    {
        if (isset($this->timers[$name]['start'])) {
            $stop = microtime(true);
            $diff = round(($stop - $this->timers[$name]['start']) * 1000, 2);

            if (isset($this->timers[$name]['time'])) {
                $diff += $this->timers[$name]['time'];
            }

            return $diff;
        }

        return $this->timers[$name]['time'];
    }

    public function stop(string $name): float
    {
        if (isset($this->timers[$name]['start'])) {
            $stop = microtime(true);
            $diff = round(($stop - $this->timers[$name]['start']) * 1000, 2);

            if (isset($this->timers[$name]['time'])) {
                $this->timers[$name]['time'] += $diff;
            } else {
                $this->timers[$name]['time'] = $diff;
            }

            unset($this->timers[$name]['start']);

            return $diff;
        }

        return $this->timers[$name];
    }
}
