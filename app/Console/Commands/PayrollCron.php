<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Http\Livewire\PayrollComponent;
use Carbon\Carbon;

class PayrollCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'calPayroll';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'calculate employee salary every month';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $componet = new PayrollComponent;
        // $componet->emptytest();
        $users = User::all();
        $date =Carbon::now()->toDateString();
//        $date =Carbon::now()->subMonth()->toDateString();
        foreach($users  as $u){
            $componet->calculation($date,$u->id);
            $componet->insertPayroll();
        }

        \Log::info("payroll created successfully");
        // return Command::SUCCESS;
    }
}
