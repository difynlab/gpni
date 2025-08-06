<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Models\User;
use App\Mail\MembershipReminderMail;
use Carbon\Carbon;

class SendMembershipReminderMail extends Command
{
    protected $signature = 'email:send-membership-reminder-email';

    protected $description = 'Send membership renew reminder emails which are going to expire within 7 days from the current date';

    public function handle()
    {
        $today = Carbon::now()->toDateString();
        $after_7_days = Carbon::now()->addDays(7);

        $users = User::whereDate('member_annual_expiry_date', '>=', $today)->whereDate('member_annual_expiry_date', '<=', $after_7_days)->get();

        foreach($users as $user) {
            $mail_data = [
                'name' => $user->first_name . ' ' . $user->last_name,
                'member_annual_expiry_date' => $user->member_annual_expiry_date
            ];
            
            send_email(new MembershipReminderMail($mail_data), $user->email);
        }
    }
}
