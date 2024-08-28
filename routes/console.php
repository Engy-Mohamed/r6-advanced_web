<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

//Schedule::command('app:send-email-command')->everyMinute();
//Schedule::command('app:expire-user-command')->everyMinute();
Schedule::command('db:backup')->daily();