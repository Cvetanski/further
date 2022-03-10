<?php

namespace App\Console\Command;

use App\Venues\Venue;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeleteVenues extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:venues';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Venues Delete';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     * @throws ApiErrorException
     */

    public function handle()
    {
       Venue::where('updated_at', '<', Carbon::now()->subDays(7)->endOfDay())->delete();

       return 0;
    }
}
