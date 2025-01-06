<?php

namespace App\Http\Controllers\Backend\Communication;

use App\Http\Controllers\Controller;
use App\Models\ContactCoach;
use App\Models\User;
use Illuminate\Http\Request;

class ContactCoachController extends Controller
{
    private function processContactCoaches($contact_coaches)
    {
        foreach($contact_coaches as $contact_coach) {
            $contact_coach->action = '
            <a id="'.$contact_coach->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $user = User::find($contact_coach->user);
            $contact_coach->user = $user->first_name . ' ' . $user->last_name;
        }

        return $contact_coaches;
    }

    public function index(Request $request)
    {
        $items = $request->items ?? 10;

        $contact_coaches = ContactCoach::where('status', '1')->orderBy('id', 'desc')->paginate($items);
        $contact_coaches = $this->processContactCoaches($contact_coaches);

        ContactCoach::where('status', '1')->where('is_new', '1')->update(['is_new' => '0']);

        return view('backend.communications.contact-coaches.index', [
            'contact_coaches' => $contact_coaches,
            'items' => $items
        ]);
    }

    public function destroy(ContactCoach $contact_coach)
    {
        $contact_coach->status = '0';
        $contact_coach->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }

    public function filter(Request $request)
    {
        if($request->action == 'reset') {
            return redirect()->route('backend.communications.contact-coaches.index');
        }

        $name = $request->name;

        $users = User::where('status', '1');
        $contact_coaches = ContactCoach::where('status', '1')->orderBy('id', 'desc');

        if($name != null) {
            $user_ids = $users->where('name', 'like', '%' . $name . '%')->pluck('id')->toArray();
            $contact_coaches->whereIn('user', $user_ids);
        }

        $items = $request->items ?? 10;
        $contact_coaches = $contact_coaches->paginate($items);
        $contact_coaches = $this->processContactCoaches($contact_coaches);

        return view('backend.communications.contact-coaches.index', [
            'contact_coaches' => $contact_coaches,
            'items' => $items,
            'name' => $name
        ]);
    }
}