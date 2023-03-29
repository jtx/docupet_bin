<?php

namespace App\Filters;

class EqualWidthFilter implements FilterInterface
{
    use FilterTrait;

    /**
     * @param array $dataSet
     * @param int $binCount
     * @return array
     */
    public function filter(array $dataSet, int $binCount): array
    {
        sort($dataSet);

        $min = min($dataSet);
        $max = max($dataSet);
        $width = ($max - $min) / $binCount;

        $boundaries = [];
        for ($i = 0; $i < $binCount; $i++) {
            $boundaries[] = $min + ($i * $width);
        }
        $boundaries[] = $max;

        $bins = [];
        foreach ($dataSet as $value) {
            for ($i = 0; $i < $binCount; $i++) {
                if ($value >= $boundaries[$i] && $value <= $boundaries[$i + 1]) {
                    $bins[$this->labels[$i]][] = $value;
                    break;
                }
            }
        }

        return $bins;
    }
}
