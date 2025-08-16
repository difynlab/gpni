<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Course;
use App\Models\CoursePurchase;
use App\Models\Setting;
use App\Models\TvContent;
use App\Models\Wallet;
use App\Models\Webinar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TvController extends Controller
{
    public function index(Request $request)
    {
        $contents = TvContent::find(1);
        $currency_symbol = ($request->middleware_language === 'en') ? '$' : '¥';

        $small_courses = Course::where('language', $request->middleware_language_name)->where('type', 'Small Course')->where('status', '1')->paginate(6);
        if($small_courses) {
            Course::where('language', $request->middleware_language_name)->where('type', 'Small Course')->where('status', '1')->paginate(6);
        }

        $recent_webinars = Webinar::where('language', $request->middleware_language_name)->where('type', 'Recent')->where('status', '1')->get();
        if($recent_webinars->isEmpty() && $request->middleware_language_name != 'English') {
            $recent_webinars = Webinar::where('language', 'English')->where('type', 'Recent')->where('status', '1')->get();
        }

        $previous_webinars = Webinar::where('language', $request->middleware_language_name)->where('type', 'Previous')->where('status', '1')->get();
        if($previous_webinars->isEmpty() && $request->middleware_language_name != 'English') {
            $previous_webinars = Webinar::where('language', 'English')->where('type', 'Previous')->where('status', '1')->get();
        }

        $settings = Setting::find(1);

        return view('frontend.pages.gpni-tv.index', [
            'contents' => $contents,
            'recent_webinars' => $recent_webinars,
            'previous_webinars' => $previous_webinars,
            'small_courses' => $small_courses,
            'currency_symbol' => $currency_symbol,
            'settings' => $settings
        ]);
    }

    public function show(Request $request, Course $course)
    {
        $currency_symbol = ($request->middleware_language === 'en') ? '$' : '¥';

        $contents = TvContent::find(1);

        return view('frontend.pages.gpni-tv.show', [
            'course' => $course,
            'contents' => $contents,
            'currency_symbol' => $currency_symbol,
        ]);
    }

    public function checkout(Request $request)
    {
        $user = Auth::user();
        $course = Course::find($request->course_id);

        $coupon_amount = 0;
        $valid_coupon_code = null;
        if($request->coupon_code) {
            $coupon_code = $request->coupon_code;
            $coupon = Coupon::where('code', $coupon_code)->where('language', $request->middleware_language_name)->where('status', '1')->first();

            if(!$coupon) {
                return back()->withInput()->withErrors([
                    'coupon_code' => 'Invalid coupon code',
                ])->with('fail', 'Invalid coupon code');
            }

            if($coupon->coupon_for != 'Course Purchase' && $coupon->coupon_for != 'Already Purchased Course') {
                return back()->withInput()->withErrors([
                    'coupon_code' => 'Invalid coupon code',
                ])->with('fail', 'Invalid coupon code');
            }

            if($coupon->coupon_for == 'Already Purchased Course') {
                if($coupon->new_course_id != $request->course_id) {
                    return back()->withInput()->withErrors([
                        'coupon_code' => 'This coupon is not valid for this course',
                    ])->with('fail', 'This coupon is not valid for this course');
                }

                $check_course_purchase = CoursePurchase::where('user_id', $user->id)->where('course_id', $coupon->old_course_id)->where('payment_status', 'Completed')->where('status', '1')->exists();

                if(!$check_course_purchase) {
                    return back()->withInput()->withErrors([
                        'coupon_code' => 'You have to purchase the prerequisite course',
                    ])->with('fail', 'You have to purchase the prerequisite course');
                }
            }

            if($coupon->coupon_validity === 'Fix Time') {
                $now = Carbon::now();
                $expiry = Carbon::parse("{$coupon->expiry_date} {$coupon->expiry_time}");

                if($expiry->lte($now)) {
                    return back()->withInput()->withErrors([
                        'coupon_code' => 'Coupon code is expired',
                    ])->with('fail', 'Coupon code is expired');
                }
            }

            if($coupon->coupon_type == 'Percentage') {
                $coupon_amount = ($coupon->value / 100) * $course->price;
            }
            else {
                $coupon_amount = $coupon->value;
            }

            $valid_coupon_code = $request->coupon_code;
        }

        $wallet = Wallet::where('user_id', $user->id)->where('status', '1')->first();
        $wallet_balance = $wallet ? $wallet->balance : '0.00';

        if($request->middleware_language == 'en') {
            $currency = 'usd';
        }
        elseif($request->middleware_language == 'zh') {
            $currency = 'cny';
        }
        else {
            $currency = 'jpy';
        }

        $course_order = new CoursePurchase();
        $course_order->user_id = Auth::user()->id;
        $course_order->course_id = $request->course_id;
        $course_order->discount_applied = $valid_coupon_code;
        $course_order->currency = $currency;
        $course_order->status = '1';
        $course_order->save();

        $total_order_amount = $course->price - $coupon_amount;
        if($total_order_amount >= $wallet_balance) {
            $amount = $total_order_amount - $wallet_balance;
        }
        else {
            $amount = '0.00';
        }

        $total_order_amount_in_cents = $currency === 'jpy' ? (int)$amount : (int)($amount * 100);

        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => $currency,
                        'product_data' => [
                            'name' => $request->course_name
                        ],
                        'unit_amount' => $total_order_amount_in_cents
                    ],
                    'quantity' => 1,
                ]
            ],
            'mode' => 'payment',
            'success_url' => route('frontend.gpni-tv.success', ['course_order_id' => $course_order->id]) . '&session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('frontend.gpni-tv.index') . '?' . http_build_query([
                    'error' => 'Course purchase has been failed because of the payment cancellation'
                ]),
        ]);
        
        return redirect()->away($session->url);
    }

    public function success(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $session_id = $request->query('session_id');
        $course_order_id = $request->query('course_order_id');

        $session = \Stripe\Checkout\Session::retrieve($session_id);

        $course_order = CoursePurchase::find($course_order_id);

        if($course_order) {
            $course_order->date = now()->toDateString();
            $course_order->time = now()->toTimeString();
            $course_order->mode = $session->mode;
            $course_order->transaction_id = $session->id;
            $course_order->amount_paid = $session->currency == 'jpy' ? $session->amount_total : $session->amount_total / 100;
            $course_order->material_logistic = 'No';
            $course_order->payment_status = 'Completed';
            $course_order->save();
        }

        $wallet = Wallet::where('user_id', $course_order->user_id)->where('status', '1')->first();
        $course = Course::find($course_order->course_id);

        if($wallet) {
            if($wallet->balance >= $course->price) {
                $wallet->balance = $wallet->balance - $course->price;
                $wallet->save();
            }
            else {
                $wallet->balance = '0.00';
                $wallet->save();
            }
        }

        return redirect()->route('frontend.gpni-tv.index')->with('complete', 'Course purchase has been successfully completed');
    }
}