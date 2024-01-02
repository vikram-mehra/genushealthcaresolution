<?php

namespace App\Http\Controllers\Client\Student\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Course;

class StudentPaymentControllers extends Controller
{
    public function index()
    {
        $payments = Payment::join('course','payments.course_id','=','course.id')->where(['payments.student_id' => \Session::get('studentsession')->id])->get(['payments.*', 'course.course_name']);
        
        return view('client/student/payment/payment_history', compact('payments'));
    }
}
