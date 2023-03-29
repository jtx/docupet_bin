<?php

namespace App\Filters;

trait FilterTrait
{
    /**
     * We're assuming there are 3 bins for this code test.
     *
     * @var array|string[]
     */
    protected array $labels = [
        'Low', 'Medium', 'High',
    ];
}
