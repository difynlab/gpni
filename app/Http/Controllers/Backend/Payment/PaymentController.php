<?php

namespace App\Http\Controllers\Backend\Payment;

use App\Http\Controllers\Controller;
use App\Mail\OnlineBooking;
use App\Models\Pass;
use App\Models\PassType;
use App\Models\PaymentMode;
use App\Models\User;
use App\Models\Coupon;
use App\Models\PassBalance;
use Carbon\Carbon;
use Dompdf\Dompdf;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use QrCode;
use DB;

class PaymentController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function checkout(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'Send me money!!!'
                        ],
                        'unit_amount' => 500
                    ],
                    'quantity' => 1,
                ]
            ],
            'mode' => 'payment',
            'success_url' => route('backend.payment.success'),
            'cancel_url' => route('backend.payment.index'),
        ]);

        return redirect()->away($session->url);
    }

    public function success()
    {
        return view('frontend.pages.homepage');
    }
}