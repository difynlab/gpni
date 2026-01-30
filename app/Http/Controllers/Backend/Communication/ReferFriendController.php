<?php

namespace App\Http\Controllers\Backend\Communication;

use App\Http\Controllers\Controller;
use App\Models\ReferFriend;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReferFriendController extends Controller
{
    private function processReferFriends($refer_friends)
    {
        foreach($refer_friends as $refer_friend) {
            $refer_friend->action = '
            <a id="'.$refer_friend->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $user = User::find($refer_friend->user_id);
            $refer_friend->user = $user->first_name . ' ' . $user->last_name;
            $refer_friend->user_email = $user->email;

            $refer_friend->date = Carbon::parse($refer_friend->created_at)->toDateString();
            $refer_friend->time = Carbon::parse($refer_friend->created_at)->toTimeString();
        }

        return $refer_friends;
    }

    public function index(Request $request)
    {
        $items = $request->items ?? 10;

        $refer_friends = ReferFriend::where('status', '1')->orderBy('id', 'desc')->paginate($items);
        $refer_friends = $this->processReferFriends($refer_friends);

        ReferFriend::where('status', '1')->where('is_new', '1')->update(['is_new' => '0']);

        return view('backend.communications.refer-friends.index', [
            'refer_friends' => $refer_friends,
            'items' => $items
        ]);
    }

    public function destroy(ReferFriend $refer_friend)
    {
        $refer_friend->status = '0';
        $refer_friend->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }
}