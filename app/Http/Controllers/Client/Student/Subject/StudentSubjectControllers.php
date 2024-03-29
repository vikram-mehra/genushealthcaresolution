<?php

namespace App\Http\Controllers\Client\Student\Subject;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseTopic;
use App\Models\Question;
use App\Models\QuizTestReport;
use Session;

class StudentSubjectControllers extends Controller
{
    public function index($subject, $topic)
    {
        $student_id = Session::get('studentsession')->id;
        $courseId = $this->getCourseId($subject);
        $courseContent = CourseTopic::select('*')
                        ->join('questions','course_topic.id','=','questions.course_topic_id')
                        ->where(['subject_title' => $topic])->first();

        $testReports = \DB::table('online_test_report')
                        ->select('online_test_report.*')
                        ->join('tbl_student','online_test_report.student_id','=','tbl_student.id')
                        ->where('online_test_report.course_topic_id',$courseContent->course_topic_id)
                        ->where('online_test_report.student_id',$student_id)
                        ->where('online_test_report.course_id',$courseId)
                        ->get();

         //dd($testReports->toArray());

        return view('client/student/subject/subject', compact('courseContent', 'subject', 'topic','testReports'));
    }

    public function report($examId)
    {
        print_r($examId); die;
        $student_id = Session::get('studentsession')->id;
        $courseId = $this->getCourseId($subject);
        $courseContent = CourseTopic::select('*')
                        ->join('questions','course_topic.id','=','questions.course_topic_id')
                        ->where(['subject_title' => $topic])->first();

        $testReports = \DB::table('online_test_report')
                        ->select('online_test_report.*')
                        ->join('tbl_student','online_test_report.student_id','=','tbl_student.id')
                        ->where('online_test_report.course_topic_id',$courseContent->course_topic_id)
                        ->where('online_test_report.student_id',$student_id)
                        ->where('online_test_report.course_id',$courseId)
                        ->get();

         //dd($testReports->toArray());

        return view('client/student/subject/subject', compact('courseContent', 'subject', 'topic','testReports'));
    }

    public function onlineTest($subject, $topic)
    {
        Session::put('testQuestions', '');

        $courseId = $this->getCourseId($subject);
        $courseTopicArr = $this->getCourseTopicId($courseId, $topic);
        $limit = $courseTopicArr['number_of_question'];

        $totalQuestions = Question::where(['course_topic_id' => $courseTopicArr['id']])
                    ->with('course', 'course_topic')
                    ->inRandomOrder()
                    ->limit($limit)
                    ->get();

        //dd($totalQuestions);
        return view('client/student/subject/online-test', compact('subject', 'topic', 'totalQuestions'));
    }

    public function startTestAndSave(Request $req, $subject, $topic)
    {

        $courseId = $this->getCourseId($subject);
        $courseTopicArr = $this->getCourseTopicId($courseId, $topic);
        $limit = $courseTopicArr['number_of_question'];
        $questions = Question::where([ 'course_topic_id' => $courseTopicArr['id']])
                    ->with('course', 'course_topic')
                    ->inRandomOrder()
                    ->limit($limit)
                    ->get();
        // if(! Session::has('testQuestions')) {
        if(empty(Session::get('testQuestions'))) {
            Session::put('testQuestions', $questions);
        }
        if($req->isMethod('post')) {
            
            $data = $req->except('_token');
            $inputArr['student_id'] = $req->session()->get('studentsession')->id;
            $totalQues = $data['total_que'];
            if(!array_key_exists('given_ans',$data)){
                return back();
            }
            $attemptQues = count($data['given_ans']);


            $qstId = [];
            $correctFlag = 0;
            foreach($data['given_ans'] as $qid => $givenAns) {
                $givenAns = (is_array($givenAns))?implode(",",$givenAns):$givenAns;
                $inputArr['question_id'] = $qid;
                $inputArr['given_ans'] = $givenAns;
                $inputArr['attempt_que'] = count($data['given_ans']);
                $inputArr['total_que'] = $data['total_que'];
                $inputArr['date'] = date('Y-m-d');
                $inputArr['correct_ans'] = \Crypt::decryptString($data['correct_ans'][$qid]);

                $chkQues = QuizTestReport::where(['student_id' => $inputArr['student_id'], 'question_id' => $qid])->first();
                // Getting Correct Answers...
                if($givenAns == \Crypt::decryptString($data['correct_ans'][$qid])) {
                    $correctFlag++;
                }
                if($chkQues) {
                    $chkQues->update(['given_ans' => $givenAns]);
                } else {
                    QuizTestReport::create($inputArr);
                }

                $qstId[] = $qid;
            }

            $quetionId = implode(',', $qstId);
            $testReport = [  
                        'student_id'      => $inputArr['student_id'],
                        'course_id'       => $courseId,
                        'course_topic_id' => $courseTopicArr['id'],
                        'questions_id'    => $quetionId,
                        'total_que'       => $data['total_que'],
                        'attempt_que'     => count($data['given_ans']),
                        'created_at'      => date('Y-m-d')
                      ];

            $insertId = \DB::table('online_test_report')->insertGetId($testReport);

             foreach($data['given_ans'] as $qid => $givenAns) {
                $givenAns = (is_array($givenAns))?implode(",",$givenAns):$givenAns;
                $inputRpt['online_test_id'] = $insertId;
                $inputRpt['question_id'] = $qid;
                $inputRpt['given_ans'] = $givenAns;
                $inputRpt['attempt_que'] = count($data['given_ans']);
                $inputRpt['correct_ans'] = \Crypt::decryptString($data['correct_ans'][$qid]);

                \DB::table('online_test_question_report')->insert($inputRpt);
            }
          
            $questions = Session::get('testQuestions');
            //print_r($data); die;
            // return back()->with(['message' => 'You have given successfully test!', 'alert-type' => 'success']);
            return view('client/student/subject/test-result', compact('totalQues', 'attemptQues', 'subject', 'topic', 'limit', 'correctFlag', 'questions', 'data'));
        }

        
        return view('client/student/subject/start-test', compact('questions', 'subject', 'topic', 'limit'));
    }

    public function getCourseId($subject)
    {
        $courseId = Course::where('course_name', $subject)->first();
        return $courseId->id;
    }

    public function getCourseTopicId($courseId, $topic)
    {
        $courseTopicId = CourseTopic::where(['subject_title' => $topic])->first();

        return array('number_of_question' => $courseTopicId->number_of_question, 'id' => $courseTopicId->id);
    }

    public static function CORRECTANS($qid,$test_id){
        $questions = explode(',', $qid);

        $Qdata = \DB::table('online_test_question_report')->where('online_test_id',$test_id)->whereIn('question_id',$questions)->get();
        $count = 0;
        foreach ($Qdata as $key => $val) {
            if($val->given_ans==$val->correct_ans){
                $count=$count+1;
            }
        }

        return $count;
    }
}
