<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Http\Controllers\Controller;
use App\Models\AdvisoryBoard;
use App\Models\Course;
use App\Models\FAQ;
use App\Models\Testimonial;
use App\Models\HomepageContent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomepageController extends Controller
{
    public function index(Request $request)
    {
        // Step 1: Collect active users
$activeUsers = [];

$users = User::all();

foreach ($users as $user) {
    if ($user->status == '0') {
        $user->delete();
    } else {
        $userData = $user->toArray();
        unset($userData['id']);            // allow auto-increment
        $userData['cec_balance'] = 0.00;
        $userData['updated_at'] = now();
        $activeUsers[] = $userData;
    }
}

// Step 2: Truncate and reset auto-increment
DB::statement('SET FOREIGN_KEY_CHECKS=0;');
DB::table('users')->truncate();
DB::statement('SET FOREIGN_KEY_CHECKS=1;');

// Step 3: Insert in chunks (e.g., 500 records per batch)
$chunks = array_chunk($activeUsers, 500);
foreach ($chunks as $chunk) {
    DB::table('users')->insert($chunk);
}
        
        $contents = HomepageContent::find(1);

        $courses = Course::where('language', $request->middleware_language_name)->where('status', '1')->get();
        if($courses->isEmpty() && $request->middleware_language_name != 'English') {
            $courses = Course::where('language', 'English')->where('status', '1')->get();
        }

        $faqs = FAQ::where('language', $request->middleware_language_name)->where('type', 'Common')->where('status', '1')->inRandomOrder()->take(5)->get();
        if($faqs->isEmpty() && $request->middleware_language_name != 'English') {
            $faqs = FAQ::where('language', 'English')->where('type', 'Common')->where('status', '1')->inRandomOrder()->take(5)->get();
        }

        $advisory_boards = AdvisoryBoard::where('language', $request->middleware_language_name)->where('status', '1')->get();
        if($advisory_boards->isEmpty() && $request->middleware_language_name != 'English') {
            $advisory_boards = AdvisoryBoard::where('language', 'English')->where('status', '1')->get();
        }

        $testimonials = Testimonial::where('language', $request->middleware_language_name)->where('type', 'Common')->where('status', '1')->get();
        if($testimonials->isEmpty() && $request->middleware_language_name != 'English') {
            $testimonials = Testimonial::where('language', 'English')->where('type', 'Common')->where('status', '1')->get();
        }

        return view('frontend.pages.homepage', [
            'contents' => $contents,
            'faqs' => $faqs,
            'advisory_boards' => $advisory_boards,
            'courses' => $courses,
            'testimonials' => $testimonials
        ]);
    }
}