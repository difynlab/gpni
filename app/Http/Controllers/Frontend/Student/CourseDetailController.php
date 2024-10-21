<?php

namespace App\Http\Controllers\Frontend\Student;
use Illuminate\Support\Facades\Auth;
use App\Models\CoursePurchase;
use App\Models\Course;
use App\Models\CourseModule;
use Carbon\Carbon;

use App\Http\Controllers\Controller;

class CourseDetailController extends Controller
{
    public function index()
    {
        $student_id = Auth::id();

        $language = session('language', 'en');
        
        switch($language){
            case 'en':
                $language_name = 'English';
                break;
            case 'zh':
                $language_name = 'Chinese';
                break;
            case 'ja':
                $language_name = 'Japanese';
                break;
            default:
                $language_name = 'unknown';
                break;
        }

        $purchased_courses = CoursePurchase::where('student_id', $student_id)->get();

        $courses_with_modules = [];

        foreach ($purchased_courses as $purchase) {

            $course_id = $purchase->course_id;
            
            $course = Course::find($course_id); // Get the course details
            
            if ($course) {
                // Get modules for the course
                $modules = CourseModule::where('course_id', $course->id)->get();

                $courses_with_modules[] = [
                    'course' => $course,
                    'modules' => $modules
                ];
            }
        }

        return view('frontend.student.course-detail', [
            'courses_with_modules' => $courses_with_modules,
            'course_id' => $course_id
        ]);

    }

    // public function show($id)
    
    public function show()
    {
        $language = session('language', 'en');
        
        switch($language){
            case 'en':
                $language_name = 'English';
                break;
            case 'zh':
                $language_name = 'Chinese';
                break;
            case 'ja':
                $language_name = 'Japanese';
                break;
            default:
                $language_name = 'unknown';
                break;
        }

        // $articles = Article::findOrFail($id);

        return view('frontend.student.course-detail-open', [
            // 'articles' => $articles
        ]);
    }

    public function list()
    {
        $student_id = Auth::id();
        $language = session('language', 'en');
        
        switch($language){
            case 'en':
                $language_name = 'English';
                break;
            case 'zh':
                $language_name = 'Chinese';
                break;
            case 'ja':
                $language_name = 'Japanese';
                break;
            default:
                $language_name = 'unknown';
                break;
        }

        // Get all courses the student has purchased
        $purchased_courses = CoursePurchase::where('student_id', $student_id)->get();

        // Fetch course details for the purchased courses
        $courses = [];
        foreach ($purchased_courses as $purchase) {
            $course = Course::find($purchase->course_id);
            if ($course) {
                $completion_date = Carbon::parse($purchase->expiration_date)->format('d M Y'); // Convert string to Carbon and format it
                $courses[] = [
                    'id' => $course->course_id,
                    'title' => $course->title,
                    'duration' => $course->duration,
                    'start_date' => $purchase->created_at->format('d M Y'), // Date of purchase
                    'completion_date' => $completion_date, // Formatted expiration date
                    'course_status' => $purchase->course_access_status, // Course access status (Active/Expired)
                    'image' => $course->image_video, // Assuming this is the image field
                    'completed' => ($purchase->course_access_status == 'Active') ? 'Completed' : 'In Progress',
                ];
            }
        }

        return view('frontend.student.course-list', [
            'courses' => $courses
        ]);
    }
}