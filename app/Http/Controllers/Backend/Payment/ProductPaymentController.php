<?php

namespace App\Http\Controllers\Backend\Payment;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductOrder;
use App\Models\ProductOrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductPaymentController extends Controller
{
    public function index()
    {
        return view('frontend.payment.product-payment');
    }

    public function checkout(Request $request)
    {
        $products = $request->products;
        $quantities = $request->quantities;

        $product_order = new ProductOrder();
        $product_order->student_id = Auth::user()->id;
        $product_order->status = '1';
        $product_order->save();

        $total_order_amount = 0;
        
        foreach($products as $key => $product) {
            $selected_product = Product::where('status', '1')->find($product);

            $product_order_detail = new ProductOrderDetail();
            $product_order_detail->product_order_id = $product_order->id;
            $product_order_detail->product_id = $product;
            $product_order_detail->quantity = $quantities[$key];
            $product_order_detail->price = $selected_product->price;
            $product_order_detail->shipping_cost = $selected_product->shipping_cost;
            $product_order_detail->total_cost = ($selected_product->price * $quantities[$key]) + $selected_product->shipping_cost;
            $product_order_detail->save();

            $total_order_amount += $product_order_detail->total_cost;
        }

        $total_order_amount_in_cents = $total_order_amount * 100;

        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'Your Order Payment'
                        ],
                        'unit_amount' => $total_order_amount_in_cents
                    ],
                    'quantity' => 1,
                ]
            ],
            'mode' => 'payment',
            'success_url' => route('backend.product-payment.success', ['product_order_id' => $product_order->id]) . '&session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('backend.product-payment.index'),
        ]);

        return redirect()->away($session->url);
    }

    public function success(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $session_id = $request->query('session_id');
        $product_order_id = $request->query('product_order_id');

        $session = \Stripe\Checkout\Session::retrieve($session_id);

        $product_order = ProductOrder::find($product_order_id);

        if($product_order) {
            $product_order->date = now()->toDateString();
            $product_order->time = now()->toTimeString();
            $product_order->mode = $session->mode;
            $product_order->transaction_id = $session->id;
            $product_order->amount_paid = $session->amount_total / 100;
            $product_order->payment_status = 'Completed';
            $product_order->save();
        }

        return redirect()->route('frontend.homepage')->with('success', 'Payment success');
    }
}