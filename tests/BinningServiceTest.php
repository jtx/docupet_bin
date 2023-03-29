<?php

namespace Tests;

use App\Filters\EqualFrequencyFilter;
use App\Filters\EqualWidthFilter;
use App\Services\BinningService;
use PHPUnit\Framework\TestCase;

class BinningServiceTest extends TestCase
{
    // Here's the math
    // (40 - 1) / 3 = 13
    // 0-13, 14-27, 28-41

    public function testEqualWidthDefaultDataset()
    {
        $billingService = new BinningService();
        $res = $billingService->runBin(new EqualWidthFilter());

        $expected = [
            'Low' => [
                .1, 2.5, 2.8,
            ],
            'Medium' => [
                3.4, 3.5, 3.6, 3.9, 4.4, 4.5, 6,
            ],
            'High' => [
                7, 9,
            ],
        ];

        $this->assertEquals($expected, $res);
    }

    public function testEqualWidthFilterLong()
    {
        $dataSet = [1, 10, 2, 20, 3, 30, 4, 40];
        $billingService = new BinningService($dataSet);
        $res = $billingService->runBin(new EqualWidthFilter());

        $expected = [
            'Low' => [
                1, 2, 3, 4, 10,
            ],
            'Medium' => [
                20,
            ],
            'High' => [
                30, 40,
            ],
        ];

        $this->assertEquals($expected, $res);
    }

    public function testEqualWidthFilterFloat()
    {
        $dataSet = [0.1, 1.10, 2.1, 20.9, 3, 30, 4, 40];
        $billingService = new BinningService($dataSet);
        $res = $billingService->runBin(new EqualWidthFilter());

        $expected = [
            'Low' => [
                .1, 1.1, 2.1, 3, 4,
            ],
            'Medium' => [
                20.9,
            ],
            'High' => [
                30, 40,
            ],
        ];

        $this->assertEquals($expected, $res);
    }

    public function testEqualFrequencyDefaultDataset()
    {
        $billingService = new BinningService();
        $res = $billingService->runBin(new EqualFrequencyFilter());

        $expected = [
            'Low' => [
                .1, 2.5, 2.8, 3.4,
            ],
            'Medium' => [
               3.5, 3.6, 3.9, 4.4,
            ],
            'High' => [
                4.5, 6, 7, 9,
            ],
        ];

        $this->assertEquals($expected, $res);
    }

    public function testEqualFrequencyFilterLong()
    {
        $dataSet = [1, 10, 2, 20, 3, 30, 4, 40];
        $billingService = new BinningService($dataSet);
        $res = $billingService->runBin(new EqualFrequencyFilter());

        $expected = [
            'Low' => [
                1, 2, 3,
            ],
            'Medium' => [
                4, 10, 20,
            ],
            'High' => [
                30, 40,
            ],
        ];

        $this->assertEquals($expected, $res);
    }

    public function testEqualFrequencyFilterFloat()
    {
        $dataSet = [0.1, 1.10, 2.1, 20.9, 3, 30, 4, 40];
        $billingService = new BinningService($dataSet);
        $res = $billingService->runBin(new EqualFrequencyFilter());

        $expected = [
            'Low' => [
                .1, 1.1, 2.1,
            ],
            'Medium' => [
                3, 4, 20.9,
            ],
            'High' => [
                30, 40,
            ],
        ];

        $this->assertEquals($expected, $res);
    }
}
