<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Truck;
use Carbon\Carbon;

class UpdateMileage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'updateMileage:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     */
    public function handle()
    {
        $trucks = Truck::all();

        foreach ($trucks as $truck) {
            if ($truck->mileage_update_method === 'average') {

                $truck->mileage += $truck->average_mileage;

                $truck->last_mileage_update = Carbon::now();

                $truck->save();
            }
        }

        return Command::SUCCESS;
    }
}
