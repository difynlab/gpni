<?php

namespace App\Http\Controllers\Backend\Order;

use App\Http\Controllers\Controller;
use App\Models\GiftCardOrder;
use Illuminate\Http\Request;

class GiftCardOrderController extends Controller
{
    private function processGiftCardOrders($gift_card_orders)
    {
        foreach($gift_card_orders as $gift_card_order) {
            $gift_card_order->action = '
            <a id="'.$gift_card_order->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $gift_card_order->payment_status = ($gift_card_order->payment_status == '1') ? '<span class="active-status">Paid</span>' : '<span class="inactive-status">Unpaid</span>';
        }

        return $gift_card_orders;
    }

    public function index(Request $request)
    {
        $items = $request->items ?? 10;

        $gift_card_orders = GiftCardOrder::where('status', '1')->orderBy('id', 'desc')->paginate($items);
        $gift_card_orders = $this->processGiftCardOrders($gift_card_orders);

        return view('backend.orders.gift-card-orders.index', [
            'gift_card_orders' => $gift_card_orders,
            'items' => $items
        ]);
    }

    public function destroy(GiftCardOrder $gift_card_order)
    {
        $gift_card_order->status = '0';
        $gift_card_order->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }

    public function filter(Request $request)
    {
        if($request->action == 'reset') {
            return redirect()->route('backend.orders.gift-card-orders.index');
        }

        $reference_code = $request->reference_code;
        $buyer_receiver_name = $request->buyer_receiver_name;
        $date = $request->date;

        $gift_card_orders = GiftCardOrder::where('status', '1')->orderBy('id', 'desc');

        if($reference_code != null) {
            $gift_card_orders->where('reference_code', 'like', '%' . $reference_code . '%');
        }

        if($buyer_receiver_name != null) {
            $gift_card_orders->where('buyer_name', 'like', '%' . $buyer_receiver_name . '%')->orWhere('receiver_name', 'like', '%' . $buyer_receiver_name . '%');
        }

        if($date != null) {
            $gift_card_orders->where('date', $date);
        }

        $items = $request->items ?? 10;
        $gift_card_orders = $gift_card_orders->paginate($items);
        $gift_card_orders = $this->processGiftCardOrders($gift_card_orders);

        return view('backend.orders.gift-card-orders.index', [
            'gift_card_orders' => $gift_card_orders,
            'items' => $items,
            'reference_code' => $reference_code,
            'buyer_receiver_name' => $buyer_receiver_name,
            'date' => $date,
        ]);
    }
}