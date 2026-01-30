<?php

namespace App\Http\Controllers\Backend\Communication;

use App\Http\Controllers\Controller;
use App\Models\TechnicalSupport;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TechnicalSupportController extends Controller
{
    private function processTechnicalSupports($technical_supports)
    {
        foreach($technical_supports as $technical_support) {
            $technical_support->action = '
            <a id="'.$technical_support->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $user = User::find($technical_support->user_id);

            $technical_support->user = $user->first_name . ' ' . $user->last_name;
            $technical_support->email = $user->email;

            $technical_support->date = Carbon::parse($technical_support->created_at)->toDateString();
            $technical_support->time = Carbon::parse($technical_support->created_at)->toTimeString();
        }

        return $technical_supports;
    }

    public function index(Request $request)
    {
        $items = $request->items ?? 10;

        $technical_supports = TechnicalSupport::where('status', '1')->orderBy('id', 'desc')->paginate($items);
        $technical_supports = $this->processTechnicalSupports($technical_supports);

        TechnicalSupport::where('status', '1')->where('is_new', '1')->update(['is_new' => '0']);

        return view('backend.communications.technical-supports.index', [
            'technical_supports' => $technical_supports,
            'items' => $items
        ]);
    }

    public function destroy(TechnicalSupport $technical_support)
    {
        $technical_support->status = '0';
        $technical_support->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }

    public function filter(Request $request)
    {
        if($request->action == 'reset') {
            return redirect()->route('backend.communications.technical-supports.index');
        }

        $name = $request->name;

        $users = User::where('status', '1');
        $technical_supports = TechnicalSupport::where('status', '1')->orderBy('id', 'desc');

        if($name != null) {
            $user_ids = $users->where(function ($query) use ($name) {
                $query->whereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ['%' . $name . '%'])
                      ->orWhereRaw("CONCAT(last_name, ' ', first_name) LIKE ?", ['%' . $name . '%']);
            })->get()->pluck('id')->toArray();

            $technical_supports->whereIn('user_id', $user_ids);
        }

        $items = $request->items ?? 10;
        $technical_supports = $technical_supports->paginate($items);
        $technical_supports = $this->processTechnicalSupports($technical_supports);

        return view('backend.communications.technical-supports.index', [
            'technical_supports' => $technical_supports,
            'items' => $items,
            'name' => $name
        ]);
    }
}