<?php

namespace MedinaProduction\Toolkit\Tests\Unit;

use MedinaProduction\Toolkit\Services\Timer;
use MedinaProduction\Toolkit\Tests\TestCase;

class TimerTest extends TestCase
{
    public function test_it_measures_time_in_milliseconds(): void
    {
        $timer = new Timer();

        $timer->start('test');
        usleep(5000);
        $elapsed = $timer->stop('test');

        $this->assertGreaterThanOrEqual(5, $elapsed);
    }

    public function test_it_reads_a_running_timer(): void
    {
        $timer = new Timer();

        $timer->start('test');
        usleep(5000);

        $this->assertGreaterThanOrEqual(5, $timer->read('test'));
    }

    public function test_it_adds_up_time_across_runs(): void
    {
        $timer = new Timer();

        $timer->start('test');
        usleep(5000);
        $first = $timer->stop('test');

        $timer->start('test');
        usleep(5000);
        $timer->stop('test');

        $this->assertGreaterThan($first, $timer->read('test'));
    }
}
