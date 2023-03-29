<?php

namespace App\Services;

use App\Filters\FilterInterface;

class BinningService
{
    /**
     * If this were full-featured we could define this somewhere on command line or something, but this is a code test.
     *
     * @var array|float[]
     */
    protected array $dataSet = [0.1, 3.4, 3.5, 3.6, 7.0, 9.0, 6.0, 4.4, 2.5, 3.9, 4.5, 2.8];

    /**
     * Could define this somewhere else or a config, but again, code test
     */
    const BIN_COUNT = 3;

    /**
     * @param array|null $dataSet
     */
    public function __construct(?array $dataSet = null)
    {
        // If you want to pass a new array go ahead, otherwise use the default.  The $dataSet = null bit is because php
        // won't let you just new BinningService(), you have to new BinningService(null). Pretty lame, even with the
        // nullable parameter
        if (!empty($dataSet)) {
            $this->dataSet = $dataSet;
        }
    }

    /**
     * @param FilterInterface $filter
     * @param int $binCount
     * @return array
     */
    public function runBin(FilterInterface $filter, int $binCount = self::BIN_COUNT): array
    {
        return $filter->filter($this->dataSet, $binCount);
    }
}
