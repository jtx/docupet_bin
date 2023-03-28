<?php

namespace App\Filters;

trait FilterTrait
{
    /**
     * This kinda assumes you're only using 3 bins, but for the sake of this test I'm not wanting to overthink it
     * @var array|string[]
     */
    protected array $labels = [
        'Low', 'Medium', 'High',
    ];
}
