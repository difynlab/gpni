<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\GiftCardPurchase;
use App\Models\ReferPointActivity;
use App\Models\Wallet;

class WalletController extends Controller
{
    public function index()
    {
        $student = Auth::user();

        $gift_card_purchases = GiftCardPurchase::where('receiver_email', $student->email)->where('payment_status', 'Completed')->where('refund_status', 'Not Refunded')->where('status', '1')->orderBy('id', 'desc')->get();
        $refer_point_activities = ReferPointActivity::where('referred_by_id', $student->id)->where('activity', 'Withdrawal')->where('status', '1')->orderBy('id', 'desc')->get();

        foreach($gift_card_purchases as $gift_card_purchase) {
            $gift_card_purchase->activity = 'Gift Card';   
            $gift_card_purchase->amount = $gift_card_purchase->amount_paid;   
        }
        foreach($refer_point_activities as $refer_point_activity) {
            $refer_point_activity->activity = 'Refer Point Withdrawal';
        }

        $activities = $gift_card_purchases->merge($refer_point_activities)->sortByDesc('id');
        $activities = $activities->values();

        $wallet = Wallet::where('user_id', $student->id)->where('status', '1')->first();
    
        return view('frontend.student.wallet', [
            'student' => $student,
            'wallet' => $wallet,
            'activities' => $activities
        ]);
    }
}