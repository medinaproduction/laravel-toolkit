<?php

namespace MedinaProduction\Toolkit\Tests\Unit;

use Illuminate\Support\Carbon;
use InvalidArgumentException;
use LogicException;
use MedinaProduction\Toolkit\Tests\Fixtures\VirtualPageView;
use MedinaProduction\Toolkit\Tests\TestCase;

class VirtualModelTest extends TestCase
{
    public function test_it_fills_and_casts_attributes(): void
    {
        $pageView = new VirtualPageView([
            'url' => 'https://example.com',
            'created_at' => '2026-01-02 03:04:05',
        ]);

        $this->assertSame('https://example.com', $pageView->url);
        $this->assertInstanceOf(Carbon::class, $pageView->created_at);
        $this->assertSame('2026-01-02 03:04:05', $pageView->created_at->toDateTimeString());
    }

    public function test_it_can_be_mapped_into_from_a_collection(): void
    {
        $pageViews = collect([
            ['url' => 'https://example.com/a'],
            ['url' => 'https://example.com/b'],
        ])->mapInto(VirtualPageView::class);

        $this->assertContainsOnlyInstancesOf(VirtualPageView::class, $pageViews);
        $this->assertSame('https://example.com/b', $pageViews->last()->url);
    }

    public function test_it_converts_to_an_array(): void
    {
        $pageView = new VirtualPageView(['url' => 'https://example.com']);

        $this->assertSame(['url' => 'https://example.com'], $pageView->toArray());
    }

    public function test_it_cannot_be_saved(): void
    {
        $this->expectException(LogicException::class);

        (new VirtualPageView())->save();
    }

    public function test_it_has_no_key(): void
    {
        $this->expectException(InvalidArgumentException::class);

        (new VirtualPageView())->getKey();
    }
}
