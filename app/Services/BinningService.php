<?php

namespace App\Services;

use App\Filters\FilterInterface;

class BinningService
{
    /**
     * @var array|float[]
     */
    protected array $dataSet = [0.1, 3.4, 3.5, 3.6, 7.0, 9.0, 6.0, 4.4, 2.5, 3.9, 4.5, 2.8];

    const BIN_COUNT = 3;

    /**
     * @param array|null $dataSet
     */
    public function __construct(?array $dataSet = null)
    {
        if (!empty($dataSet)) {
            $this->dataSet = $dataSet;
        }
    }

    /**
     * @param FilterInterface $filter
     * @return array
     */
    public function runBin(FilterInterface $filter): array
    {
        return $filter->filter($this->dataSet, self::BIN_COUNT);
    }
}
