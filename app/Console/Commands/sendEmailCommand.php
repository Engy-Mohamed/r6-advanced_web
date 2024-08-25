<?php

namespace App\Console\Commands;
use App\Mail\contactUs;
use App\Mail\sendEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;


class sendEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-email-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send welcome email';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Mail::to("test@example.com")->send(new sendEmail());
    }
}
