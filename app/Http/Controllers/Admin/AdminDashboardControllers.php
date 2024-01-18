<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;

class AdminDashboardControllers extends Controller
{
    public function Index(){
        return view('admin/dashboard');
    }

    public function studentInvoice($id){
       $data = array();
    	$paymentId = base64_decode($id);
        
    	$data['PaymentData'] = Payment::join('tbl_student','payments.student_id','=','tbl_student.id')->leftJoin('course','payments.course_id','=','course.id')->where('payments.id',$paymentId)->first(['payments.*','tbl_student.name as studentname','course.course_name']);
        return view('client/student/invoice',$data);
    }
}
