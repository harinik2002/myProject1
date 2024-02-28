<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DeleteEmployeeDetails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'employee:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete one employee\'s details from the database.';

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
        // Retrieve the oldest employee record from the database
        $employee = DB::table('employee')->oldest('id')->first();

        if ($employee) {
            // Delete the retrieved employee record
            DB::table('employee')->where('id', $employee->id)->delete();
            $this->info('Oldest employee details deleted successfully.');
        } else {
            $this->info('No employee found to delete.');
        }

        return 0;
    }
}
