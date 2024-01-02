<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Course;

class PaymentHistoryController extends Controller
{
    public function paymentHistory(){
    	 $data['paymentData'] = Payment::join('course','payments.course_id','=','course.id')->join('tbl_student','payments.student_id','=','tbl_student.id')->orderBy('payments.id','DESC')->get(['payments.*','tbl_student.name as studentname','course.course_name']);
    	 
    }
}
