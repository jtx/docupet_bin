<?php

namespace App\Services;

use App\Filters\FilterInterface;

class BinningService
{
    /**
     * Hard coded for this test, but you're able to pass a different array if you'd like
     *
     * @var array|float[]
     */
    protected array $dataSet = [0.1, 3.4, 3.5, 3.6, 7.0, 9.0, 6.0, 4.4, 2.5, 3.9, 4.5, 2.8];

    /**
     * Hard coded for this test
     */
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
     * @param int $binCount
     * @return array
     */
    public function runBin(FilterInterface $filter, int $binCount = self::BIN_COUNT): array
    {
        return $filter->filter($this->dataSet, $binCount);
    }
}
