<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\ProductContent;
use App\Models\ProductOrder;
use App\Models\ProductOrderDetail;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProductPurchaseMail;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $currency_symbol = ($request->middleware_language === 'en') ? '$' : '¥';

        $contents = ProductContent::find(1);

        $categories = ProductCategory::where('language', $request->middleware_language_name)->where('status', '1')->get();
        // if($categories->isEmpty() && $request->middleware_language_name != 'English') {
        //     $categories = ProductCategory::where('language', 'English')->where('status', '1')->get();
        // }

        $products = Product::where('language', $request->middleware_language_name)->where('status', '1')->get();
        // if($products->isEmpty() && $request->middleware_language_name != 'English') {
        //     $products = Product::where('language', 'English')->where('status', '1')->get(8);
        // }

        return view('frontend.pages.products', [
            'contents' => $contents,
            'categories' => $categories,
            'products' => $products,
            'currency_symbol' => $currency_symbol
        ]);
    }

    public function checkout(Request $request)
    {
        $user = Auth::user();
        $wallet = Wallet::where('user_id', $user->id)->where('status', '1')->first();
        $wallet_balance = $wallet ? $wallet->balance : '0.00';

        $products = $request->products;
        $quantities = $request->quantities;

        if($request->middleware_language == 'en') {
            $currency = 'usd';
        }
        elseif($request->middleware_language == 'zh') {
            $currency = 'cny';
        }
        else {
            $currency = 'jpy';
        }

        $product_order = new ProductOrder();
        $product_order->user_id = Auth::user()->id;
        $product_order->currency = $currency;
        $product_order->status = '1';
        $product_order->save();

        $total_order_amount = 0;
        foreach($products as $key => $product) {
            $selected_product = Product::where('status', '1')->find($product);

            $product_order_detail = new ProductOrderDetail();
            $product_order_detail->product_order_id = $product_order->id;
            $product_order_detail->product_id = $product;
            $product_order_detail->size = Cart::where('product_id', $product)->where('status', 'Active')->first()->size;
            $product_order_detail->color = Cart::where('product_id', $product)->where('status', 'Active')->first()->color;
            $product_order_detail->quantity = $quantities[$key];
            $product_order_detail->price = $selected_product->price;
            $product_order_detail->shipping_cost = $selected_product->shipping_cost;
            $product_order_detail->total_cost = ($selected_product->price * $quantities[$key]) + $selected_product->shipping_cost;
            $product_order_detail->save();

            $total_order_amount += $product_order_detail->total_cost;
        }

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
                            'name' => 'Your Order Payment'
                        ],
                        'unit_amount' => $total_order_amount_in_cents
                    ],
                    'quantity' => 1,
                ]
            ],
            'mode' => 'payment',
            'success_url' => route('frontend.products.success', ['product_order_id' => $product_order->id, 'total_order_amount' => $total_order_amount]) . '&session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('frontend.products.index') . '?' . http_build_query([
                    'error' => 'Product/s purchase has been failed because of the payment cancellation'
                ]),
        ]);

        return redirect()->away($session->url);
    }

    public function success(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $session_id = $request->query('session_id');
        $product_order_id = $request->query('product_order_id');
        $total_order_amount = $request->query('total_order_amount');

        $session = \Stripe\Checkout\Session::retrieve($session_id);

        $product_order = ProductOrder::find($product_order_id);

        if($product_order) {
            $product_order->date = now()->toDateString();
            $product_order->time = now()->toTimeString();
            $product_order->mode = $session->mode;
            $product_order->transaction_id = $session->id;
            $product_order->amount_paid = $session->currency == 'jpy' ? $session->amount_total : $session->amount_total / 100;
            $product_order->payment_status = 'Completed';
            $product_order->save();
        }

        $ordered_products = ProductOrderDetail::where('product_order_id', $product_order_id)->get();
        $ordered_product_ids = $ordered_products->pluck('product_id')->toArray();
  
        Cart::whereIn('product_id', $ordered_product_ids)->where('status', 'Active')->update(['status' => 'Purchased']);

        $wallet = Wallet::where('user_id', $product_order->user_id)->where('status', '1')->first();

        if($wallet) {
            if($wallet->balance >= $total_order_amount) {
                $product_order->wallet_amount = $total_order_amount;
                $product_order->save();

                $wallet->balance = $wallet->balance - $total_order_amount;
                $wallet->save();
            }
            else {
                $product_order->wallet_amount = $wallet->balance;
                $product_order->save();

                $wallet->balance = '0.00';
                $wallet->save();
            }
        }

        $user = Auth::user();

        if($product_order->currency == 'usd') {
            $symbol = '$';
        }
        else {
            $symbol = '¥';
        }

        foreach($ordered_products as $key => $ordered_product) {
            $product = Product::find($ordered_product->product_id);

            $ordered_product->name = $product->name;
        }

        $mail_data = [
            'name' => $user->first_name . ' ' . $user->last_name,
            'symbol' => $symbol,
            'products' => $ordered_products,
            'total' => $product_order->amount_paid
        ];

        Mail::to($user->email)->send(new ProductPurchaseMail($mail_data));

        return redirect()->route('frontend.products.index')->with('complete', 'Product/s purchase has been successfully completed');
    }
}