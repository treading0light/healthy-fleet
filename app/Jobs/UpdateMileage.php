<?php

namespace App\Jobs;

use App\Models\Truck;
use Carbon\Carbon;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateMileage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     * 
     * @param App\Models\Truck $truck
     * @return void
     */

    protected $truck;

    public function __construct()
    {
        $this->trucks = Truck::all();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        foreach ($this->trucks as $truck) {
            if ($truck->mileage_update_method == 'average') {

                $truck->mileage += $truck->average_mileage;

                $truck->last_mileage_update = Carbon::now();

                $truck->save();
            }
        }
    }
}
