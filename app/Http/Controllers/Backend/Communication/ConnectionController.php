<?php

namespace App\Http\Controllers\Backend\Communication;

use App\Http\Controllers\Controller;
use App\Models\Connection;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ConnectionController extends Controller
{
    private function processConnections($connections)
    {
        foreach($connections as $connection) {
            $connection->action = '
            <a id="'.$connection->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $connection->date = Carbon::parse($connection->created_at)->toDateString();
            $connection->time = Carbon::parse($connection->created_at)->toTimeString();
        }

        return $connections;
    }

    public function index(Request $request)
    {
        $items = $request->items ?? 10;

        $connections = Connection::where('status', '1')->orderBy('id', 'desc')->paginate($items);
        $connections = $this->processConnections($connections);

        Connection::where('status', '1')->where('is_new', '1')->update(['is_new' => '0']);

        return view('backend.communications.connections.index', [
            'connections' => $connections,
            'items' => $items
        ]);
    }

    public function destroy(Connection $connection)
    {
        $connection->status = '0';
        $connection->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }
}