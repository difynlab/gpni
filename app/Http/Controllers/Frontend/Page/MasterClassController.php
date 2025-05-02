<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Http\Controllers\Controller;
use App\Models\AdvisoryBoard;
use App\Models\FAQ;
use App\Models\MasterClassContent;
use App\Models\Course;
use App\Models\CoursePurchase;
use App\Models\CourseReview;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\CoursePurchaseMail;
use App\Mail\ReferFriendCoursePurchaseMail;
use App\Models\ReferFriend;
use App\Models\ReferPointActivity;
use App\Models\User;
use Carbon\Carbon;

class MasterClassController extends Controller
{
    public function index(Request $request)
    {
        $contents = MasterClassContent::find(1);
        $currency_symbol = ($request->middleware_language === 'en') ? '$' : '¥';

        $faqs = FAQ::where('language', $request->middleware_language_name)->where('type', 'Master Class')->where('status', '1')->get();
        if($faqs->isEmpty() && $request->middleware_language_name != 'English') {
            $faqs = FAQ::where('language', 'English')->where('type', 'Master Class')->where('status', '1')->get();
        }

        $all_courses = $request->master_class ? Course::where('title', 'like', '%' . $request->master_class . '%')->where('language', $request->middleware_language_name)->where('type', 'Master')->where('status', '1')->paginate(6) : Course::where('language', $request->middleware_language_name)->where('type', 'Master')->where('status', '1')->paginate(6);

        // $upcoming_courses = $request->master_class ? Course::where('title', 'like', '%' . $request->master_class . '%')->where('language', $request->middleware_language_name)->where('type', 'Upcoming')->where('status', '1')->paginate(6) : Course::where('language', $request->middleware_language_name)->where('type', 'Upcoming')->where('status', '1')->paginate(6);

        $testimonials = Testimonial::where('language', $request->middleware_language_name)
            ->where('type', 'Master Class')
            ->where('status', '1')
            ->orderBy('id', 'desc')  // This ensures the newest testimonial is first
            ->get();
        if($testimonials->isEmpty() && $request->middleware_language_name != 'English') {
            $testimonials = Testimonial::where('language', 'English')
                ->where('type', 'Master Class')
                ->where('status', '1')
                ->orderBy('id', 'desc')  // This ensures the newest testimonial is first
                ->get();
        }

        return view('frontend.pages.master-classes.index', [
            'contents' => $contents,
            'faqs' => $faqs,
            'all_courses' => $all_courses,
            // 'upcoming_courses' => $upcoming_courses,
            'testimonials' => $testimonials,
            'currency_symbol' => $currency_symbol,
            'master_class' => $request->master_class
        ]);
    }

    public function show(Request $request, Course $course)
    {
        $currency_symbol = ($request->middleware_language === 'en') ? '$' : '¥';

        $advisory_boards = AdvisoryBoard::where('language', $request->middleware_language_name)->where('status', '1')->get();
        if($advisory_boards->isEmpty() && $request->middleware_language_name != 'English') {
            $advisory_boards = AdvisoryBoard::where('language', 'English')->where('status', '1')->get();
        }

        $faqs = FAQ::where('language', $request->middleware_language_name)->where('type', 'Master Class')->where('status', '1')->get();
        if($faqs->isEmpty() && $request->middleware_language_name != 'English') {
            $faqs = FAQ::where('language', 'English')->where('type', 'Master Class')->where('status', '1')->get();
        }

        $testimonials = Testimonial::where('language', $request->middleware_language_name)
            ->where('type', 'Master Class')
            ->where('status', '1')
            ->orderBy('id', 'desc')  // This ensures the newest testimonial is first
            ->get();
        if($testimonials->isEmpty() && $request->middleware_language_name != 'English') {
            $testimonials = Testimonial::where('language', 'English')
                ->where('type', 'Master Class')
                ->where('status', '1')
                ->orderBy('id', 'desc')  // This ensures the newest testimonial is first
                ->get();
        }

        $course_reviews = CourseReview::where('course_id', $course->id)->where('status', '1')->get();

        if($course_reviews->isNotEmpty()) {
            $rating = $course_reviews->sum('rating') / $course_reviews->count();
            $average_rating = round($rating);
        }
        else {
            $average_rating = 0;
        }

        $contents = MasterClassContent::find(1);
        $settings = Setting::find(1);

        return view('frontend.pages.master-classes.show', [
            'course' => $course,
            'advisory_boards' => $advisory_boards,
            'faqs' => $faqs,
            'settings' => $settings,
            'currency_symbol' => $currency_symbol,
            'testimonials' => $testimonials,
            'course_reviews' => $course_reviews,
            'average_rating' => $average_rating,
            'contents' => $contents
        ]);
    }

    public function checkout(Request $request)
    {
        if($request->middleware_language == 'en') {
            $currency = 'usd';
        }
        elseif($request->middleware_language == 'zh') {
            $currency = 'cny';
        }
        else {
            $currency = 'jpy';
        }

        $user = Auth::user();
        $course = Course::find($request->course_id);
        $wallet = Wallet::where('user_id', $user->id)->where('status', '1')->first();
        $wallet_balance = $wallet ? $wallet->balance : '0.00';

        if($course->price >= $wallet_balance) {
            $amount = $course->price - $wallet_balance;
        }
        else {
            $amount = '0.00';
        }

        $course_order = new CoursePurchase();
        $course_order->user_id = Auth::user()->id;
        $course_order->course_id = $request->course_id;
        $course_order->currency = $currency;
        $course_order->status = '1';
        $course_order->save();

        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $total_order_amount_in_cents = $currency === 'jpy' ? (int)$amount : (int)($amount * 100);

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
            'success_url' => route('frontend.master-classes.success', ['course_order_id' => $course_order->id]) . '&session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('frontend.master-classes.index') . '?' . http_build_query([
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

            Mail::to($referrer->email)->send(new ReferFriendCoursePurchaseMail($mail_data));
        }

        $mail_data = [
            'name' => $user->first_name . ' ' . $user->last_name,
            'course' => $course->title,
            'material_logistic' => 'No'
        ];
        
        $file_name = null;
        $file_path = null;

        Mail::to($user->email)->send(new CoursePurchaseMail($mail_data, $file_path, $file_name));

        return redirect()->route('frontend.master-classes.index')->with('complete', 'Course purchase has been successfully completed');
    }
}