<?php

namespace App\Filters;

class EqualFrequencyFilter implements FilterInterface
{
    use FilterTrait;

    /**
     * @param array $dataSet
     * @param int $binCount
     * @return array
     */
    public function filter(array $dataSet, int $binCount): array
    {
        $countSet = count($dataSet);
        $binSize = floor($countSet / $binCount);
        $remainder = $countSet % $binCount;

        $bins = [];

        foreach ($this->labels as $label) {
            $bins[$label] = [];
            $itemsInBin = $binSize;

            if ($remainder > 0) {
                $itemsInBin++;
                $remainder--;
            }

            while ($itemsInBin > 0 && $countSet > 0) {
                $bins[$label][] = array_shift($dataSet);
                $itemsInBin--;
            }
        }

        return $bins;
    }
}
