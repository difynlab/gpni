<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Http\Controllers\Controller;
use App\Models\ContactCoach;
use App\Models\NutritionistContent;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class NutritionistController extends Controller
{
    public function index(Request $request)
    {
        $contents = NutritionistContent::find(1);

        $nutritionists = $request->nutritionist
                    ? User::where(function ($query) use ($request) {
                        $query->where('first_name', 'like', '%' . $request->nutritionist . '%')
                              ->orWhere('last_name', 'like', '%' . $request->nutritionist . '%')
                              ->orWhere('certificate_number', 'like', '%' . $request->nutritionist . '%');
                    })
                    ->where('language', $request->middleware_language_name)
                    ->where('is_certified', '1')
                    ->where('role', 'student')
                    // ->where(function ($query) {
                    //     $query->where('is_certified', '1')
                    //           ->orWhere('is_sns', '1')
                    //           ->orWhere('is_snc', '1')
                    //           ->orWhere('is_cissn', '1')
                    //           ->orWhere('is_asnc', '1');
                    // })
                    ->where('status', '1')
                    ->paginate(20)
                    : User::where('language', $request->middleware_language_name)
                    ->where('is_certified', '1')
                    ->where('role', 'student')
                    // ->where(function ($query) {
                    //     $query->where('is_certified', '1')
                    //           ->orWhere('is_sns', '1')
                    //           ->orWhere('is_snc', '1')
                    //           ->orWhere('is_cissn', '1')
                    //           ->orWhere('is_asnc', '1');
                    // })
                    ->where('status', '1')
                    ->paginate(20);

        if($nutritionists->isEmpty() && $request->middleware_language_name != 'English') {
            $nutritionists = $request->nutritionist
                    ? User::where(function ($query) use ($request) {
                        $query->where('name', 'like', '%' . $request->nutritionist . '%')
                                ->orWhere('last_name', 'like', '%' . $request->nutritionist . '%')
                                ->orWhere('certificate_number', 'like', '%' . $request->nutritionist . '%');
                    })
                    ->where('language', 'English')
                    ->where('is_certified', '1')
                    ->where('role', 'student')
                    // ->where(function ($query) {
                    //     $query->where('is_certified', '1')
                    //           ->orWhere('is_sns', '1')
                    //           ->orWhere('is_snc', '1')
                    //           ->orWhere('is_cissn', '1')
                    //           ->orWhere('is_asnc', '1');
                    // })
                    ->where('status', '1')
                    ->paginate(20)
                    : User::where('language', 'English')
                    ->where('is_certified', '1')
                    ->where('role', 'student')
                    // ->where(function ($query) {
                    //     $query->where('is_certified', '1')
                    //           ->orWhere('is_sns', '1')
                    //           ->orWhere('is_snc', '1')
                    //           ->orWhere('is_cissn', '1')
                    //           ->orWhere('is_asnc', '1');
                    // })
                    ->where('status', '1')
                    ->paginate(20);
        }

        return view('frontend.pages.nutritionists', [
            'contents' => $contents,
            'nutritionists' => $nutritionists,
            'nutritionist' => $request->nutritionist
        ]);
    }

    public function fetch(User $nutritionist)
    {
        $url = url("nutritionists?nutritionist-id=" . $nutritionist->id);

        $qrcode = QrCode::generate($url);

        $html = 'data:image/svg+xml;base64,' . base64_encode($qrcode);

        return response()->json([
            'nutritionist' => $nutritionist,
            'html' => $html
        ]);
    }

    public function contact(Request $request)
    {
        $nutritionist = User::find($request->nutritionist);

        $contact_coach = new ContactCoach();
        $data = $request->except('middleware_language', 'middleware_language_name', 'nutritionist');
        $data['user'] = $nutritionist->id;
        $data['date'] = Carbon::now()->toDateString();
        $data['status'] = '1';
        $contact_coach->create($data);

        return redirect()->back()->with('success', 'Message sent successfully');
    }
}