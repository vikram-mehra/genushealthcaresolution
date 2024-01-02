<?php

namespace App\Http\Controllers\Client\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Payment;
use Razorpay\Api\Api;
use Exception;
use Session;

class BuyCourseController extends Controller
{
    public function __construct()  
    {
        \Session::put('buyCourse', '1');
        \Session::put('buyCourseUrl', url()->current());

        $this->middleware('StudentAuth');  
    } 

    public function index($subject)
    {

        $course = Course::with('course_topic')->where(['course_name' => ucfirst($subject)])->first();
        $chkPayment = Payment::where(['student_id' => \Session::get('studentsession')->id, 'course_id' => $course->id])->get();
        // $count = Payment::count();
        $orderId = 'ORD'.rand(1111111, 9999999);
        $userData = \Session::get('studentsession');

        return view('/client/course/buy-now', compact('course', 'chkPayment', 'orderId', 'userData'));
    }

    public function buyCourse(Request $request, $subject)
    {
        Session::put('orderId', '');
        $reqArr = $request->except('_token');
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $payment = $api->payment->fetch($reqArr['razorpay_payment_id']);
       //dd($payment->amount);
        if(count($reqArr)  && !empty($reqArr['razorpay_payment_id'])) {
            
            try {
                $response = $api->payment->fetch($reqArr['razorpay_payment_id'])->capture(array('amount' => intval($reqArr['course_price']*100)));

                if($response) {
                    $inputArr['student_id'] = $request->session()->get('studentsession')->id;
                    $inputArr['order_id'] = \Crypt::decryptString($reqArr['order_id']);
                    $inputArr['course_id'] = \Crypt::decryptString($reqArr['course_id']);
                    $inputArr['transaction_id'] = $reqArr['razorpay_payment_id'];
                    $inputArr['name'] = 'Test-'.preg_replace('/[^0-9]/', '', $inputArr['order_id']);
                    $inputArr['phone'] = $reqArr['phone'];
                    $inputArr['payment_mode'] = $payment->method;
                    $inputArr['payment_status'] = $payment->status;
                    $inputArr['amount'] = $payment->amount/100;
                    $inputArr['date'] = date('Y-m-d');

                    try {
                        Payment::create($inputArr);
                        Session::put('orderId', $inputArr['order_id']);

                        return redirect('student/dashboard')->with(['message' => 'Thank you for purchasing our course !', 'alert-type' => 'success']);
                    } catch (Exception $e) {
                        return back()->with(['message' => $e->getMessage(), 'alert-type' => 'error']);
                    }
                }

            } catch (Exception $e) {
                return back()->with(['message' => $e->getMessage(), 'alert-type' => 'error']);
            }
        } else {
            return back()->with(['message' => 'Razorpay Payment Id not found.', 'alert-type' => 'error']);
        }
    }
}
