<?php

namespace App\Http\Controllers\Backend\Coupon;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CouponController extends Controller
{
    private function processCoupons($coupons)
    {
        foreach($coupons as $coupon) {
            $coupon->action = '
            <a href="'. route('backend.coupons.edit', $coupon->id) .'" class="edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
            <a id="'.$coupon->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $coupon->status = ($coupon->status == '1') ? '<span class="active-status">Active</span>' : '<span class="inactive-status">Inactive</span>';
        }

        return $coupons;
    }

    public function index(Request $request)
    {
        $items = $request->items ?? 10;

        $coupons = Coupon::where('status', '!=', '0')->orderBy('id', 'desc')->paginate($items);
        $coupons = $this->processCoupons($coupons);

        return view('backend.coupons.index', [
            'coupons' => $coupons,
            'items' => $items
        ]);
    }

    public function create()
    {
        $courses = Course::where('status', '1')->get();
        
        return view('backend.coupons.create', [
            'courses' => $courses
        ]);
    }
                                                                              
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'code' => 'required',
            'coupon_for' => 'required|in:Course Purchase,Membership Purchase,Product Purchase,Already Purchased Course',
            'coupon_type' => 'required|in:Amount,Percentage',
            'coupon_validity' => 'required|in:Fix Time,Life Time',
            'value' => 'required|numeric',
            'status' => 'required'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Creation failed!');
        }

        if($request->coupon_for == 'Already Purchased Course') {
            $validator = Validator::make($request->all(), [
                'old_course_id' => 'required',
                'new_course_id' => [
                    'required',
                    function($attribute, $value, $fail) use ($request) {
                        if($value == $request->old_course_id) {
                            $fail('The new course must not match the old course');
                        }
                    },
                ],
            ]);

            if($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Creation failed!');
            }
        }

        if($request->coupon_validity == 'Fix Time') {
            $validator = Validator::make($request->all(), [
                'expiry_date' => 'required',
                'expiry_time' => 'required',
            ]);

            if($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Creation failed!');
            }
        }

        $coupon = new Coupon();
        $data = $request->all();
        $coupon->create($data);

        return redirect()->route('backend.coupons.index')->with('success', 'Successfully created!');
    }

    public function edit(Coupon $coupon)
    {
        $courses = Course::where('status', '1')->get();

        return view('backend.coupons.edit', [
            'coupon' => $coupon,
            'courses' => $courses
        ]);
    }

    public function update(Request $request, Coupon $coupon)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'code' => 'required',
            'coupon_for' => 'required|in:Course Purchase,Membership Purchase,Product Purchase,Already Purchased Course',
            'coupon_type' => 'required|in:Amount,Percentage',
            'coupon_validity' => 'required|in:Fix Time,Life Time',
            'value' => 'required|numeric',
            'status' => 'required'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Creation failed!');
        }

        if($request->coupon_for == 'Already Purchased Course') {
            $validator = Validator::make($request->all(), [
                'old_course_id' => 'required',
                'new_course_id' => [
                    'required',
                    function($attribute, $value, $fail) use ($request) {
                        if($value == $request->old_course_id) {
                            $fail('The new course must not match the old course');
                        }
                    },
                ],
            ]);

            if($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Creation failed!');
            }
        }

        if($request->coupon_validity == 'Fix Time') {
            $validator = Validator::make($request->all(), [
                'expiry_date' => 'required',
                'expiry_time' => 'required',
            ]);

            if($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Creation failed!');
            }
        }

        $data = $request->all();
        $coupon->fill($data)->save();
        
        return redirect()->route('backend.coupons.index')->with('success', "Successfully updated!");
    }

    public function destroy(Coupon $coupon)
    {
        $coupon->status = '0';
        $coupon->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }

    public function filter(Request $request)
    {
        if($request->action == 'reset') {
            return redirect()->route('backend.coupons.index');
        }

        $title = $request->title;
        $language = $request->language;

        $coupons = Coupon::where('status', '!=', '0')->orderBy('id', 'desc');

        if($title != null) {
            $coupons->where('title', 'like', '%' . $title . '%');
        }

        if($language != 'All') {
            $coupons->where('language', $language);
        }

        $items = $request->items ?? 10;
        $coupons = $coupons->paginate($items);
        $coupons = $this->processCoupons($coupons);

        return view('backend.coupons.index', [
            'coupons' => $coupons,
            'items' => $items,
            'title' => $title,
            'language' => $language
        ]);
    }
}
