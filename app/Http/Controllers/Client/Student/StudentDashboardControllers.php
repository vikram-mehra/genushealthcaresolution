<?php

namespace App\Http\Controllers\Client\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use Session;

class StudentDashboardControllers extends Controller
{
    public function Index() {

    	// $payment = Session::get('payments');
    	// $courses = count(Session::get('courses'));
        $paymentData = Payment::where('student_id',Session::get('studentsession')->id)->get();
        $CourseData  = Payment::where('student_id',Session::get('studentsession')->id)->count();
        
        $priceData = 0;
        foreach($paymentData as $k => $val) {
            $priceData += $val->amount;
        }

        $payment = $priceData;
        $courses = $CourseData;
        
        return view('client/student/dashboard', compact('courses', 'payment'));
    }

    public function studentInvoice($id){
    	$data = array();
    	$paymentId = base64_decode($id);
    	$data['PaymentData'] = Payment::join('tbl_student','payments.student_id','=','tbl_student.id')->join('course','payments.course_id','=','course.id')->where('payments.id',$paymentId)->first(['payments.*','tbl_student.name as studentname','course.course_name']);

    	return view('client/student/invoice',$data);
    }
}
