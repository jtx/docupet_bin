<?php

namespace App\Commands;

use App\Filters\EqualFrequencyFilter;
use App\Filters\EqualWidthFilter;
use App\Services\BinningService;
use LaravelZero\Framework\Commands\Command;

class PetBinCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'pet-bin {filter?} {--ds=*}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Run the test binning utility';

    /**
     * @var array|string[]
     */
    protected array $validFilters = ['frequency', 'width'];

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $filter = $this->argument('filter');
        // Laravel Zero doesn't have the validator class so... Cheese it.
        if (!in_array($filter, $this->validFilters)) {
            $this->error('Invalid filter. Valid filters are: ' . join(', ', $this->validFilters));

            return 1;
        }

        if ($filter === 'frequency') {
            $filterClass = new EqualFrequencyFilter();
        } elseif ($filter === 'width') {
            $filterClass = new EqualWidthFilter();
        } else {
            $this->error('There is no way this could have happened but we\'ll check anyway. Please contact support.');

            return 1;
        }

        // Command line dataset input options, takes an array via passing the option over and over ie --ds=1 --ds=25 --ds=100
        $dataSet = $this->option('ds');
        $dataSet = array_filter($dataSet, 'is_numeric');

        $service = new BinningService($dataSet);
        $res = $service->runBin($filterClass);

        $this->line(json_encode($res));
    }
}
