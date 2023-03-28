<?php

namespace App\Filters;
interface FilterInterface
{
    /**
     * @param array $dataSet
     * @param int $binCount
     * @return array
     */
    public function filter(array $dataSet, int $binCount): array;
}
