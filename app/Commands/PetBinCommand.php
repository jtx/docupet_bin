<?php

namespace App\Commands;

use App\Filters\EqualFrequencyFilter;
use App\Filters\EqualWidthFilter;
use App\Services\BinningService;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class PetBinCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'pet-bin {filter}';

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
        if (!in_array($filter, $this->validFilters)) {
            $this->error('Invalid filter. Valid filters are: ' . join(', ', $this->validFilters));

            return 1;
        }

        $filterClass = new \StdClass();
        if ($filter == 'frequency') {
            $filterClass = new EqualFrequencyFilter();
        } elseif ($filter == 'width') {
            $filterClass = new EqualWidthFilter();
        } else {
            $this->error('There is no way this could have happened but we\'ll check anyway. Please contact support.');

            return 1;
        }

        $service = new BinningService();
        $res = $service->runBin($filterClass);
        dd($res);

        $this->line($filter);

    }

    /**
     * Define the command's schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
