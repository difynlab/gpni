<?php

namespace App\Http\Controllers\Backend\Purchase;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\FinalExamPurchase;
use App\Models\User;
use Illuminate\Http\Request;

class FinalExamPurchaseController extends Controller
{
    private function processFinalExamPurchases($final_exam_purchases)
    {
        foreach($final_exam_purchases as $final_exam_purchase) {
            $final_exam_purchase->action = '
            <a href="'. route('backend.purchases.final-exam-purchases.show', $final_exam_purchase->id) .'" class="review-button" title="Details"><i class="bi bi-calendar-fill"></i></a>
            <a id="'.$final_exam_purchase->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $final_exam_purchase->user_id = User::find($final_exam_purchase->user_id)->first_name . ' ' . User::find($final_exam_purchase->user_id)->last_name;

            $final_exam_purchase->course_id = Course::find($final_exam_purchase->course_id)->title;

            $final_exam_purchase->date_time = $final_exam_purchase->date . ' | ' . $final_exam_purchase->time;

            $final_exam_purchase->payment_status = 
                ($final_exam_purchase->payment_status == 'Completed') 
                ? '<span class="active-status">Completed</span>' 
                : (($final_exam_purchase->payment_status == 'Pending') 
                    ? '<span class="pending-status">Pending</span>' 
                    : '<span class="inactive-status">Failed</span>');
        }

        return $final_exam_purchases;
    }

    public function index(Request $request)
    {
        $items = $request->items ?? 10;

        $final_exam_purchases = FinalExamPurchase::where('status', '1')->orderBy('id', 'desc')->paginate($items);
        $final_exam_purchases = $this->processFinalExamPurchases($final_exam_purchases);

        return view('backend.purchases.final-exam-purchases.index', [
            'final_exam_purchases' => $final_exam_purchases,
            'items' => $items
        ]);
    }

    public function show(FinalExamPurchase $final_exam_purchase)
    {
        $student = User::find($final_exam_purchase->user_id)->first_name . ' ' . User::find($final_exam_purchase->user_id)->last_name;

        $course = Course::where('status', '1')->find($final_exam_purchase->course_id)->title;

        return view('backend.purchases.final-exam-purchases.show', [
            'final_exam_purchase' => $final_exam_purchase,
            'student' => $student,
            'course' => $course
        ]);
    }

    public function destroy(FinalExamPurchase $final_exam_purchase)
    {
        $final_exam_purchase->status = '0';
        $final_exam_purchase->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }

    public function filter(Request $request)
    {
        if($request->action == 'reset') {
            return redirect()->route('backend.purchases.final-exam-purchases.index');
        }

        $transaction_id = $request->transaction_id;
        $date = $request->date;

        $final_exam_purchases = FinalExamPurchase::where('status', '1')->orderBy('id', 'desc');

        if($transaction_id != null) {
            $final_exam_purchases->where('transaction_id', 'like', '%' . $transaction_id . '%');
        }

        if($date != null) {
            $final_exam_purchases->where('date', $date);
        }

        $items = $request->items ?? 10;
        $final_exam_purchases = $final_exam_purchases->paginate($items);
        $final_exam_purchases = $this->processFinalExamPurchases($final_exam_purchases);

        return view('backend.purchases.final-exam-purchases.index', [
            'final_exam_purchases' => $final_exam_purchases,
            'items' => $items,
            'transaction_id' => $transaction_id,
            'date' => $date
        ]);
    }
}