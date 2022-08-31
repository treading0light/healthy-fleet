<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\User;
use App\Models\Company;
use App\Models\Truck;
use App\Models\Service;

class DeleteDemoUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deleteDemoUsers:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove users flagged with "demo" and all related records';

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
        // services must be deleted independently
        
        $users = User::where('status', 'demo')
            ->get();

        foreach ($users as $user) {
            
            $trucks = Truck::where('company_id', $user->company_id)
            ->get();

            foreach($trucks as $truck) {
                $truck->services()->delete();
            }

            $user->company->delete();
        }

        return Command::SUCCESS;
    }
}
