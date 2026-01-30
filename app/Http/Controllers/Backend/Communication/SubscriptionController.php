<?php

namespace App\Http\Controllers\Backend\Communication;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    private function processSubscriptions($subscriptions)
    {
        foreach($subscriptions as $subscription) {
            $subscription->action = '
            <a id="'.$subscription->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $subscription->date = Carbon::parse($subscription->created_at)->toDateString();
            $subscription->time = Carbon::parse($subscription->created_at)->toTimeString();
        }

        return $subscriptions;
    }

    public function index(Request $request)
    {
        $items = $request->items ?? 10;

        $subscriptions = Subscription::where('status', '1')->orderBy('id', 'desc')->paginate($items);
        $subscriptions = $this->processSubscriptions($subscriptions);

        Subscription::where('status', '1')->where('is_new', '1')->update(['is_new' => '0']);

        return view('backend.communications.subscriptions.index', [
            'subscriptions' => $subscriptions,
            'items' => $items
        ]);
    }

    public function destroy(Subscription $subscription)
    {
        $subscription->status = '0';
        $subscription->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }
}