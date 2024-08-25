<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class ExpireUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:expire-user-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'make the user expired';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        User::where('expired','=',0)->update(['expired'=>1]);
    }
}
