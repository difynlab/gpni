<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriptionAlertMail;


class SendSubscriptionAlert extends Command
{
    protected $signature = 'subscription:alert';
    protected $description = 'Send subscription expiry alerts to users every hour';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $users = User::where('subscription_end_date', '<=', Carbon::now()->addDay())->get();

        foreach ($users as $user) {
            Mail::to($user->email)->send(new SubscriptionAlertMail($user));
        }

        $this->info('Subscription alerts sent successfully.');
    }
}
