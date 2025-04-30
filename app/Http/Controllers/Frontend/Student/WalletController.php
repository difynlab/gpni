<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Http\Controllers\Controller;
use App\Models\CoursePurchase;
use Illuminate\Support\Facades\Auth;
use App\Models\GiftCardPurchase;
use App\Models\MaterialPurchase;
use App\Models\MembershipPurchase;
use App\Models\ProductOrder;
use App\Models\ReferPointActivity;
use App\Models\Wallet;

class WalletController extends Controller
{
    public function index()
    {
        $student = Auth::user();

        $gift_card_purchases = GiftCardPurchase::where('receiver_email', $student->email)->where('payment_status', 'Completed')->where('refund_status', 'Not Refunded')->where('status', '1')->orderBy('id', 'desc')->get();
        $refer_point_activities = ReferPointActivity::where('referred_by_id', $student->id)->where('activity', 'Withdrawal')->where('status', '1')->orderBy('id', 'desc')->get();
        $course_purchases = CoursePurchase::where('user_id', $student->id)->where('payment_status', 'Completed')->where('refund_status', 'Not Refunded')->where('wallet_amount', '!=', 0.00)->where('status', '1')->orderBy('id', 'desc')->get();
        $product_purchases = ProductOrder::where('user_id', $student->id)->where('payment_status', 'Completed')->where('refund_status', 'Not Refunded')->where('wallet_amount', '!=', 0.00)->where('status', '1')->orderBy('id', 'desc')->get();
        $membership_purchases = MembershipPurchase::where('user_id', $student->id)->where('payment_status', 'Completed')->where('refund_status', 'Not Refunded')->where('wallet_amount', '!=', 0.00)->where('status', '1')->orderBy('id', 'desc')->get();
        $material_purchases = MaterialPurchase::where('user_id', $student->id)->where('payment_status', 'Completed')->where('refund_status', 'Not Refunded')->where('wallet_amount', '!=', 0.00)->where('status', '1')->orderBy('id', 'desc')->get();

        foreach($gift_card_purchases as $gift_card_purchase) {
            $gift_card_purchase->activity = 'Gift Card';   
            $gift_card_purchase->amount = $gift_card_purchase->amount_paid;   
        }
        foreach($refer_point_activities as $refer_point_activity) {
            $refer_point_activity->activity = 'Refer Point Withdrawal';
        }
        foreach($course_purchases as $course_purchase) {
            $course_purchase->activity = 'Course Purchase';
            $course_purchase->amount = $course_purchase->wallet_amount;
        }
        foreach($product_purchases as $product_purchase) {
            $product_purchase->activity = 'Product Purchase';
            $product_purchase->amount = $product_purchase->wallet_amount;
        }
        foreach($membership_purchases as $membership_purchase) {
            $membership_purchase->activity = 'Membership Purchase';
            $membership_purchase->amount = $membership_purchase->wallet_amount;
        }
        foreach($material_purchases as $material_purchase) {
            $material_purchase->activity = 'Material Purchase';
            $material_purchase->amount = $material_purchase->wallet_amount;
        }

        $activities = $gift_card_purchases->merge($refer_point_activities)->merge($course_purchases)->merge($product_purchases)->merge($membership_purchases)->merge($material_purchases)->sortByDesc('created_at');
        $activities = $activities->values();

        $wallet = Wallet::where('user_id', $student->id)->where('status', '1')->first();

        if(!$wallet) {
            $wallet_balance = '0.00';
        }
        else {
            $wallet_balance = $wallet->balance;
        }
    
        return view('frontend.student.wallet', [
            'student' => $student,
            'wallet_balance' => $wallet_balance,
            'activities' => $activities
        ]);
    }
}