<?php

namespace App\Http\Controllers\Admin\Register;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Crypt;
use App\Models\Payment;
use App\Models\Course;
use Validator;
use DB;
use App\Models\CourseTopic;

class RegisterControllers extends Controller
{
    public function Index(Request $req){
        $data['error'] = '';
        $data['singledata'] = '';

        if($req->isMethod('post')) {
            $validator = Validator::make($req->all(), [ 
                'name'             => 'required|min:3',
                'email'            => 'required|email',
                'phone'            => 'required|min:10|max:10' ,
                'password'         => 'required| min:6|same:confirm_password',
                'confirm_password' => 'required'
            ]);

            if ($validator->fails()) { 
                return redirect()
                    ->back()
                    ->withInput($req->input())
                    ->withErrors($validator->errors());
            }
            if($req->register_id){
                $result = $this->Update($req);

                if($result == 'chkCourse') {
                    $notification = array(
                        'message' => 'Already assigned this course for this student!',
                        'alert-type' => 'error'
                    );
                    return  back()->with($notification);
                } else {
                    $notification = array(
                        'message' => 'The student has updated successfully.!',
                        'alert-type' => 'success'
                    );
                    return  redirect('/admin/register/register-view')->with($notification);
                }

                
            } else {
                if(DB::table('tbl_student')->where('phone',$req->phone)->exists()) {
                     $data['error'] = "Mobile already exists";
                     return view('admin/register/register',$data);
                }
                if(DB::table('tbl_student')->where('email',$req->email)->exists()) {
                     $data['error'] = "Email already exists";
                     return view('admin/register/register',$data);
                } else {
                    $insert = $this->Add($req); 
                    $notification = array(
                        'message' => 'The student has registered successfully.!',
                        'alert-type' => 'success'
                    ); 

                    return  redirect('/admin/register/register-view')->with($notification);  
                }    
            }
        }

        return view('admin/register/register', $data);
    }
    public function Add($req){
        $paramArray = [
                        'name'       => $req->name,
                        'email'      => $req->email,
                        'phone'      => $req->phone,
                        'password'   => Crypt::encryptString($req->password),
                        'status'     => 1,
                        'created_at' => date('Y-m-d H:i:s')
                        ];

        return DB::table('tbl_student')->insert($paramArray);

    }

    public function Update($req){
        
        $paramArray = [
            'name'       => $req->name,
            'email'      => $req->email,
            'phone'      => $req->phone,
            'password'   => Crypt::encryptString($req->password),
            'status'     => $req->status,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        // Assigned Student courses here..
        if($req->has('course_id')) {
            $courseId = $req->input('course_id');
            $orderId = Payment::orderBy('id', 'desc')->limit(1)->pluck('id');
            $orderId = (isset($orderId[0])) ? $orderId[0] : 'ORD'.rand(1111111, 9999999);
            Payment::where(['student_id' => $req->register_id])->delete();

            foreach ($courseId as $cid) {
                Payment::create(['student_id' => $req->register_id, 'course_id' => $cid, 'order_id' => 'GEN00'.$orderId]);
            }
        }

        return DB::table('tbl_student')->where('id', $req->register_id)->update($paramArray);


    }

    public function ListRegister(){
        $name   = (isset($_GET['candidate_name'])) ? trim($_GET['candidate_name']) : '';
        $email  = (isset($_GET['email'])) ? trim($_GET['email']) : '';
        $mobile = (isset($_GET['mobile'])) ? trim($_GET['mobile']) : '';
        //filer name
        $query =  DB::table('tbl_student');
        if ($name!='') {
            $query = $query->where('name', 'LIKE', '%' . $name . '%');
        }
        if ($email!='') {
            $query = $query->where('email', 'LIKE', '%' . $email . '%');
        }
        if ($mobile!='') {
            $query = $query->where('phone', 'LIKE', '%' . $mobile . '%');
        }
        $data['studentlist'] = $query->orderBy('id','DESC')->paginate(50);
        $courses = Payment::with('course')->whereStatus(1)->get();
        //print_r($courses);die;
        $courseArr = [];
        if(! empty($courses)) {
            foreach($courses as $val) {
                $courseArr[$val->student_id]['name']= isset($val->course->course_name)?$val->course->course_name:'';
            }
        }
        
        $data['courses'] = $courseArr;
        //print_r($data['courses']);die;
        return view('admin/register/list_register',$data);
    }

    public function GetUpdate($id){
        $data['error']      ='';
        $data['singledata'] = DB::table('tbl_student')->where('id', $id)->first();
        $data['courses'] = Payment::with('course')->where(['student_id' => $id, 'status' => 1])->get();
        // dd($data['courses']->toArray());
        $data['courseArr'] = Course::whereStatus(1)->get();
        $orderId = Payment::orderBy('id', 'desc')->limit(1)->pluck('id');
        $orderId = (isset($orderId[0])) ? $orderId[0] : 'ORD'.rand(1111111, 9999999);
        $data['order_id'] = $orderId;
        $data['adminAssign'] = true;
        
        return view('admin/register/register', $data);
    }

    public function getTestList($id)
    {
        $data['testReports'] = \DB::table('online_test_report')
                        ->select('online_test_report.*','course.course_name','course_topic.subject_title','tbl_student.name')
                        ->join('course','course.id','=','online_test_report.course_id')
                        ->join('course_topic','course_topic.id','=','online_test_report.course_topic_id')
                        ->join('tbl_student','online_test_report.student_id','=','tbl_student.id')
                        ->where('online_test_report.student_id',$id)
                        ->get();
        return view('admin/register/stu-test-list', $data);
    }

    public function report($examId)
    {
        $testReports = \DB::table('online_test_report')
                        ->select('online_test_report.*','course.course_name','course_topic.subject_title')
                        ->join('course','course.id','=','online_test_report.course_id')
                        ->join('course_topic','course_topic.id','=','online_test_report.course_topic_id')
                        ->where('online_test_report.id',$examId)
                        ->get();
        $totalQues   = $testReports[0]->total_que;
        $attemptQues = $testReports[0]->attempt_que;
        $qstId       = $testReports[0]->questions_id;
        $student_id  = $testReports[0]->student_id;
        $subject     = $testReports[0]->course_name;
        $topic       = $testReports[0]->subject_title;
        
        $correctFlag = 0;
        $questions = [];
        $testReportsAns = \DB::table('online_test_question_report')
                        ->select('online_test_question_report.*','questions.question','questions.quizType')
                        ->join('questions','questions.id','=','online_test_question_report.question_id')
                        ->where('online_test_question_report.online_test_id',$examId)
                        ->get();
        if(!$testReportsAns->isEmpty()) {
            foreach($testReportsAns as $val) {
                $data['given_ans'][$val->question_id] = $val->given_ans;
                $data['correct_ans'][$val->question_id] = $val->correct_ans;
                $data['quizType'][$val->question_id] = $val->quizType;
                $questions[] = ['id'=>$val->question_id , 'question'=>$val->question];
                if($val->given_ans == $val->correct_ans) {
                    $correctFlag++;
                }
            }
        }
        return view('admin/register/stu-test-result', compact('totalQues', 'attemptQues', 'subject', 'topic',  'correctFlag', 'questions', 'data'));
    }


    public function Delete($id){
        DB::table('tbl_student')->where('id',$id)->delete();
        $notification = array(
                        'message' => 'Student is Deleted',
                        'alert-type' => 'error'
                    ); 
        
        return back()->with($notification);
    }
}
