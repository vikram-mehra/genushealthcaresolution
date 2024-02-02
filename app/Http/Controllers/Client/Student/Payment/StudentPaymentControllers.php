<?php

namespace App\Http\Controllers\Client\Student\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\CoursePdf;
use App\Models\StudentDoc;

class StudentPaymentControllers extends Controller
{
    public function index()
    {
        $payments = Payment::join('course','payments.course_id','=','course.id')->where(['payments.student_id' => \Session::get('studentsession')->id])->get(['payments.*', 'course.course_name']);
        
        return view('client/student/payment/payment_history', compact('payments'));
    }

    public function getDocList(Request $req)
    {   
        if(session()->get('studentsession')->expiry_date <= date("Y-m-d")) {
            return redirect(url('/student/dashboard'));
        }
        $doc = StudentDoc::with('course_pdf', 'student')
                ->where('student_id', '=', \Session::get('studentsession')->id)
                ->get();
        return view('client/student/payment/course_doc', compact('doc'));
    }

    public function viewDoc($Id)
    {   
        if(session()->get('studentsession')->expiry_date <= date("Y-m-d")) {
            return redirect(url('/student/dashboard'));
        }
        $doc1 = CoursePdf::where('id', '=', $Id)
                ->first();
        $doc = $doc1->course_pdf;
        return view('client/student/payment/view_doc', compact('doc'));
    }
}
