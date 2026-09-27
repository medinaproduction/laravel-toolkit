<?php

namespace MedinaProduction\Toolkit\Tests\Fixtures;

use MedinaProduction\Toolkit\ModelTypes\VirtualModel;

class VirtualPageView extends VirtualModel
{
    protected $fillable = [
        'url',
        'created_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];
}
