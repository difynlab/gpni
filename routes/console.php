<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

// Schedule::command('email:send-membership-reminder-email')->everyMinute();
Schedule::command('email:send-membership-reminder-email')->dailyAt('08:00');