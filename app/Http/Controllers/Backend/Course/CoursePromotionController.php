<?php

namespace App\Http\Controllers\Backend\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CoursePromotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CoursePromotionController extends Controller
{
    private function processCoursePromotions($course_promotions)
    {
        foreach($course_promotions as $course_promotion) {
            $course_promotion->action = '
            <a href="'. route('backend.course-promotions.edit', $course_promotion->id) .'" class="edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
            <a id="'.$course_promotion->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $course_promotion->status = ($course_promotion->status == '1') ? '<span class="active-status">Active</span>' : '<span class="inactive-status">Inactive</span>';
        }

        return $course_promotions;
    }

    public function index(Request $request)
    {
        $items = $request->items ?? 10;

        $course_promotions = CoursePromotion::where('status', '!=', '0')->orderBy('id', 'desc')->paginate($items);
        $course_promotions = $this->processCoursePromotions($course_promotions);

        return view('backend.course-promotions.index', [
            'course_promotions' => $course_promotions,
            'items' => $items
        ]);
    }

    public function create()
    {
        $courses = Course::where('status', '1')->get();
        
        return view('backend.course-promotions.create', [
            'courses' => $courses
        ]);
    }
                                                                              
    public function store(Request $request)
    {
        $promotion_type = $request->type;

        if($promotion_type == 'Course Discount') {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'old_course_id' => 'required',
                'new_course_id' => [
                    'required',
                    function($attribute, $value, $fail) use ($request) {
                        if($value == $request->old_course_id) {
                            $fail('The new course ID must not match the old course ID');
                        }
                    },
                ],
                'value' => 'required|numeric',
                'status' => 'required'
            ]);
        }
        else {
            $validator = Validator::make($request->all(), [
                'coupon_code' => 'required',
                'coupon_code_type' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'value' => 'required|numeric',
                'status' => 'required'
            ]);
        }

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Creation failed!');
        }

        $course_promotion = new CoursePromotion();
        $data = $request->all();
        $course_promotion->create($data);

        return redirect()->route('backend.course-promotions.index')->with('success', 'Successfully created!');
    }

    public function edit(CoursePromotion $course_promotion)
    {
        $courses = Course::where('status', '1')->get();

        return view('backend.course-promotions.edit', [
            'course_promotion' => $course_promotion,
            'courses' => $courses
        ]);
    }

    public function update(Request $request, CoursePromotion $course_promotion)
    {
        $promotion_type = $request->type;

        if($promotion_type == 'Course Discount') {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'old_course_id' => 'required',
                'new_course_id' => [
                    'required',
                    function($attribute, $value, $fail) use ($request) {
                        if($value == $request->old_course_id) {
                            $fail('The new course ID must not match the old course ID');
                        }
                    },
                ],
                'value' => 'required|numeric',
                'status' => 'required'
            ]);
        }
        else {
            $validator = Validator::make($request->all(), [
                'coupon_code' => 'required',
                'coupon_code_type' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'value' => 'required|numeric',
                'status' => 'required'
            ]);
        }

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Update failed!');
        }

        $data = $request->all();
        $course_promotion->fill($data)->save();
        
        return redirect()->route('backend.course-promotions.index')->with('success', "Successfully updated!");
    }

    public function destroy(CoursePromotion $course_promotion)
    {
        $course_promotion->status = '0';
        $course_promotion->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }
}
