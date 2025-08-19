<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Http\Controllers\Controller;
use App\Models\AdvisoryBoard;
use App\Models\CertificationCourseContent;
use App\Models\Course;
use App\Models\CoursePurchase;
use App\Models\CourseReview;
use App\Models\Testimonial;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\CoursePurchaseMail;
use App\Mail\ReferFriendCoursePurchaseMail;
use App\Models\Coupon;
use App\Models\ReferFriend;
use App\Models\ReferPointActivity;
use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;

class CertificationCourseController extends Controller
{
    public function show(Request $request, Course $course)
    {
        $currency_symbol = ($request->middleware_language === 'en') ? '$' : '¥';

        $advisory_boards = AdvisoryBoard::where('language', $request->middleware_language_name)->where('status', '1')->orderBy('id', 'desc')->take(9)->get();
        if($advisory_boards->isEmpty() && $request->middleware_language_name != 'English') {
            $advisory_boards = AdvisoryBoard::where('language', 'English')->where('status', '1')->orderBy('id', 'desc')->take(9)->get();
        }

        $testimonials = Testimonial::where('language', $request->middleware_language_name)->where('type', 'Certification Course')->where('status', '1')->orderBy('id', 'desc')->get();
        if($testimonials->isEmpty() && $request->middleware_language_name != 'English') {
            $testimonials = Testimonial::where('language', 'English')->where('type', 'Certification Course')->where('status', '1')->orderBy('id', 'desc')->get();
        }

        $course_reviews = CourseReview::where('course_id', $course->id)->where('status', '1')->get();

        if($course_reviews->isNotEmpty()) {
            $rating = $course_reviews->sum('rating') / $course_reviews->count();
            $average_rating = round($rating);
        }
        else {
            $average_rating = 0;
        }

        $contents = CertificationCourseContent::find(1);

        $master_pack = $request->middleware_language == 'en' ? Course::find(19) : Course::find(47);
        
        return view('frontend.pages.certification-courses.show', [
            'currency_symbol' => $currency_symbol,
            'contents' => $contents,
            'course' => $course,
            'advisory_boards' => $advisory_boards,
            'testimonials' => $testimonials,
            'course_reviews' => $course_reviews,
            'average_rating' => $average_rating,
            'master_pack' => $master_pack,
        ]);
    }

    public function purchase(Request $request, Course $course)
    {
        $user = Auth::user();
        $wallet = Wallet::where('user_id', $user->id)->where('status', '1')->first();
        $currency_symbol = ($request->middleware_language === 'en') ? '$' : '¥';

        $wallet_balance = $wallet ? $wallet->balance : '0.00';

        if($course->price >= $wallet_balance) {
            $total_amount = $course->price - $wallet_balance;
            $total_amount = sprintf('%.2f', $total_amount);
        }
        else {
            $total_amount = '0.00';
        }

        $course_discount = '0.00';

        if($request->middleware_language == 'ja') {
            $course->instalment_price = number_format($course->instalment_price, 0, '.', ',');
            $course->price = number_format($course->price, 0, '.', ',');
            $course->material_logistic_price = number_format($course->material_logistic_price, 0, '.', ',');
            $wallet_balance = number_format($wallet_balance, 0, '.', ',');
            $total_amount = number_format($total_amount, 0, '.', ','); 
            $course_discount = number_format($course_discount, 0, '.', ','); 
        }

        $contents = CertificationCourseContent::find(1);
        
        return view('frontend.pages.certification-courses.payment', [
            'contents' => $contents,
            'course' => $course,
            'currency_symbol' => $currency_symbol,
            'wallet_balance' => $wallet_balance,
            'total_amount' => $total_amount,
            'course_discount' => $course_discount
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
                ]);
            }

            if($coupon->coupon_for != 'Course Purchase' && $coupon->coupon_for != 'Already Purchased Course') {
                return back()->withInput()->withErrors([
                    'coupon_code' => 'Invalid coupon code',
                ]);
            }

            if($coupon->coupon_for == 'Already Purchased Course') {
                if($coupon->new_course_id != $request->course_id) {
                    return back()->withInput()->withErrors([
                        'coupon_code' => 'This coupon is not valid for this course',
                    ]);
                }

                $check_course_purchase = CoursePurchase::where('user_id', $user->id)->where('course_id', $coupon->old_course_id)->where('payment_status', 'Completed')->where('status', '1')->exists();

                if(!$check_course_purchase) {
                    return back()->withInput()->withErrors([
                        'coupon_code' => 'You have to purchase the prerequisite course',
                    ]);
                }
            }

            // if($coupon->language != $request->middleware_language_name) {
            //     return back()->withErrors([
            //         'coupon_code' => 'Coupon code is not valid for selected language',
            //     ]);
            // }

            if($coupon->coupon_validity === 'Fix Time') {
                $now = Carbon::now();
                $expiry = Carbon::parse("{$coupon->expiry_date} {$coupon->expiry_time}");

                if($expiry->lte($now)) {
                    return back()->withInput()->withErrors([
                        'coupon_code' => 'Coupon code is expired',
                    ]);
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
        $course_order->user_id = $user->id;
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

        if($request->payment_mode == 'payment') {
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
                        'quantity' => 1
                    ]
                ],
                'mode' => 'payment',
                'success_url' => route('frontend.certification-courses.success', ['course_order_id' => $course_order->id, 'material_logistic' => $request->material_logistic]) . '&session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('frontend.certification-courses.show', [
                    $request->course_id,
                    $course->title
                ]) . '?' . http_build_query([
                    'error' => 'Course purchase has been failed because of the payment cancellation'
                ]),
            ]);
        }
        else {
            $price_id = $request->price_id;

            $session = \Stripe\Checkout\Session::create([
                'line_items' => [
                    [
                        'price' => $price_id,
                        'quantity' => 1
                    ]
                ],
                'mode' => 'subscription',
                'success_url' => route('frontend.certification-courses.success', ['course_order_id' => $course_order->id, 'material_logistic' => $request->material_logistic]) . '&session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('frontend.certification-courses.show', [
                    $request->course_id,
                    $course->title
                ]) . '?' . http_build_query([
                    'error' => 'Course purchase has been failed because of the payment cancellation'
                ]),
            ]);

            // $subscriptionSchedule = \Stripe\SubscriptionSchedule::create([
            //     'start_date' => 'now',
            //     'end_behavior' => 'cancel',
            //     'phases' => [
            //         [
            //             'items' => [
            //                 [
            //                     'price' => $price_id,
            //                     'quantity' => 1,
            //                 ],
            //             ],
            //             'iterations' => 6,
            //         ],
            //     ],
            // ]);

            // $session = \Stripe\Checkout\Session::create([
            //     'mode' => 'subscription',
            //     'subscription_data' => [
            //         'schedule' => $subscriptionSchedule->id,
            //     ],
            //     'line_items' => [
            //         [
            //             'price' => $price_id,
            //             'quantity' => 1,
            //         ],
            //     ],
            //     'success_url' => route('frontend.certification-courses.success', [
            //         'course_order_id' => $course_order->id,
            //         'material_logistic' => $request->material_logistic,
            //     ]) . '&session_id={CHECKOUT_SESSION_ID}',
            //     'cancel_url' => route('frontend.certification-courses.show', $request->course_id),
            // ]);
        }

        return redirect()->away($session->url);
    }

    public function success(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $session_id = $request->query('session_id');
        $course_order_id = $request->query('course_order_id');
        $material_logistic = $request->query('material_logistic');

        $session = \Stripe\Checkout\Session::retrieve($session_id);

        $course_order = CoursePurchase::find($course_order_id);

        if($course_order) {
            $course_order->date = now()->toDateString();
            $course_order->time = now()->toTimeString();
            $course_order->mode = $session->mode;
            $course_order->transaction_id = $session->id;
            $course_order->amount_paid = $session->currency == 'jpy' ? $session->amount_total : $session->amount_total / 100;
            $course_order->material_logistic = $material_logistic;
            $course_order->payment_status = 'Completed';
            $course_order->save();
        }

        $wallet = Wallet::where('user_id', $course_order->user_id)->where('status', '1')->first();
        $course = Course::find($course_order->course_id);

        if($material_logistic == 'Yes') {
            $material_logistic_price = $course->material_logistic_price;

            $file_name = $course->material_logistic;
            $file_path = storage_path('app/public/backend/courses/material-and-logistics/' . $file_name);
        }
        else {
            $material_logistic_price = 0;

            $file_name = null;
            $file_path = null;
        }

        if($wallet) {
            if($wallet->balance >= ($course->price + $material_logistic_price)) {
                $course_order->wallet_amount = $course->price + $material_logistic_price;
                $course_order->save();

                $wallet->balance = $wallet->balance - ($course->price + $material_logistic_price);
                $wallet->save();
            }
            else {
                $course_order->wallet_amount = $wallet->balance;
                $course_order->save();

                $wallet->balance = '0.00';
                $wallet->save();
            }
        }

        if($course->id == 19) {
            if($session->currency == 'usd') {
                $course_purchase_1 = new CoursePurchase();
                $course_purchase_1->user_id = $course_order->user_id;
                $course_purchase_1->course_id = 6;
                $course_purchase_1->currency = $session->currency;
                $course_purchase_1->date = now()->toDateString();
                $course_purchase_1->time = now()->toTimeString();
                $course_purchase_1->mode = $session->mode;
                $course_purchase_1->transaction_id = $session->id;
                $course_purchase_1->amount_paid = $session->currency == 'jpy' ? $session->amount_total : $session->amount_total / 100;
                $course_purchase_1->material_logistic = 'No';
                $course_purchase_1->master_pack_buy = 'Yes';
                $course_purchase_1->payment_status = 'Completed';
                $course_purchase_1->status = '1';
                $course_purchase_1->save();

                $course_purchase_2 = new CoursePurchase();
                $course_purchase_2->user_id = $course_order->user_id;
                $course_purchase_2->course_id = 7;
                $course_purchase_2->currency = $session->currency;
                $course_purchase_2->date = now()->toDateString();
                $course_purchase_2->time = now()->toTimeString();
                $course_purchase_2->mode = $session->mode;
                $course_purchase_2->transaction_id = $session->id;
                $course_purchase_2->amount_paid = $session->currency == 'jpy' ? $session->amount_total : $session->amount_total / 100;
                $course_purchase_2->material_logistic = 'No';
                $course_purchase_2->master_pack_buy = 'Yes';
                $course_purchase_2->payment_status = 'Completed';
                $course_purchase_2->status = '1';
                $course_purchase_2->save();
            }
            // else {
            //     $currency = 'jpy';
            // }
        }
        elseif($course->id == 47) {
            if($session->currency == 'cny') {
                $course_purchase_1 = new CoursePurchase();
                $course_purchase_1->user_id = $course_order->user_id;
                $course_purchase_1->course_id = 10;
                $course_purchase_1->currency = $session->currency;
                $course_purchase_1->date = now()->toDateString();
                $course_purchase_1->time = now()->toTimeString();
                $course_purchase_1->mode = $session->mode;
                $course_purchase_1->transaction_id = $session->id;
                $course_purchase_1->amount_paid = $session->currency == 'jpy' ? $session->amount_total : $session->amount_total / 100;
                $course_purchase_1->material_logistic = 'No';
                $course_purchase_1->master_pack_buy = 'Yes';
                $course_purchase_1->payment_status = 'Completed';
                $course_purchase_1->status = '1';
                $course_purchase_1->save();

                $course_purchase_2 = new CoursePurchase();
                $course_purchase_2->user_id = $course_order->user_id;
                $course_purchase_2->course_id = 12;
                $course_purchase_2->currency = $session->currency;
                $course_purchase_2->date = now()->toDateString();
                $course_purchase_2->time = now()->toTimeString();
                $course_purchase_2->mode = $session->mode;
                $course_purchase_2->transaction_id = $session->id;
                $course_purchase_2->amount_paid = $session->currency == 'jpy' ? $session->amount_total : $session->amount_total / 100;
                $course_purchase_2->material_logistic = 'No';
                $course_purchase_2->master_pack_buy = 'Yes';
                $course_purchase_2->payment_status = 'Completed';
                $course_purchase_2->status = '1';
                $course_purchase_2->save();
            }
        }

        $user = Auth::user();

        if($user->referred_by) {
            $invite = ReferFriend::where('user_id', $user->referred_by)->where('email', $user->email)->where('status', '1')->orderBy('created_at', 'desc')->first();

            if($course->referral_point_percentage) {
                $points = $course->referral_point_percentage;
            }
            else {
                $setting = Setting::find(1);

                if($course->language == 'English') {
                    $points = $setting->referral_point_percentage_en;
                }
                else if($course->language == 'Chinese') {
                    $points = $setting->referral_point_percentage_zh;
                }
                else {
                    $points = $setting->referral_point_percentage_ja;
                }
            }

            $calculated_points = ($points / 100) * $course->price;
            $last_refer_point_activity = ReferPointActivity::where('refer_id', $invite->id)->where('status', '1')->orderBy('id', 'desc')->first();

            ReferPointActivity::create([
                'refer_id' => $invite->id,
                'user_id' => $user->id,
                'referred_by_id' => $invite->user_id,
                'activity' => 'Referral account course purchased: ' . $user->first_name . ' ' . $user->last_name . ' | ' . $course->title,
                'date' => Carbon::now()->toDateString(),
                'time' => Carbon::now()->toTimeString(),
                'points' => $calculated_points,
                'balance' => $last_refer_point_activity->balance + $calculated_points,
                'amount' => 0,
                'type' => 'Addition',
                'status' => '1'
            ]);

            $referrer = User::where('status', '1')->find($user->referred_by);

            $mail_data = [
                'name' => $referrer->first_name . ' ' . $referrer->last_name,
                'friend_name' => $user->first_name . ' ' . $user->last_name,
                'friend_email' => $user->email,
                'course' => $course->title,
                'points' => $calculated_points
            ];

            send_email(new ReferFriendCoursePurchaseMail($mail_data), $referrer->email);
        }

        $mail_data = [
            'name' => $user->first_name . ' ' . $user->last_name,
            'course' => $course->title,
            'material_logistic' => $material_logistic
        ];

        send_email(new CoursePurchaseMail($mail_data, $file_path, $file_name, 'user'), $user->email);
        send_email(new CoursePurchaseMail($mail_data, $file_path, $file_name, 'admin'), config('app.admin_emails'));

        return redirect()->route('frontend.homepage')->with('complete', 'Course purchase has been successfully completed');
    }
}