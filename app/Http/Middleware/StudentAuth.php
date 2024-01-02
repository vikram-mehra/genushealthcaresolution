<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Payment;
use App\Models\CourseTopic;
use App\Models\CourseAssignTopic;
use App\Models\Question;
use Session;

class StudentAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $where['status'] = 1;
        $courses = [];
        $dataArray=[];
        $payments = 0;
        // Getting all courses here...
        // $courses = Course::with('course_topic')->whereStatus(1)->get();
        if ($request->session()->has('studentsession')) {
            $where['student_id'] = $request->session()->get('studentsession')->id;
        
        
        // $coursesArr = Payment::with(['course' => function($q) {
        //                 $q->with('course_topic');
        //             }])->where($where)->get()->pluck('course');

        $coursesArrD = Payment::select('payments.course_id','course.course_name','course_assign_topics.course_topic_id')
                        ->join('course','payments.course_id','=','course.id')
                        ->join('course_assign_topics','payments.course_id','=','course_assign_topics.course_id')
                        ->where('student_id',$request->session()->get('studentsession')->id)
                        ->get();
        
                $dataArray = [];
                foreach($coursesArrD as $key=>$val){
                  $course_topic_assign_id = explode(',', $val->course_topic_id);
                    $topics = Question::select('course_topic.subject_title')
                              ->join('course_topic','questions.course_topic_id','=','course_topic.id')
                              ->whereIn('course_topic.id',$course_topic_assign_id)
                              ->distinct()
                              ->get();
                    
                    
                    $dataArray[$key]['course_id']    = $val->course_id;
                    $dataArray[$key]['course_name']  = $val->course_name;
                    $dataArray[$key]['course_topic'] = $topics;

                    $payments += $val->course_price;
                }

        }

        // if(! empty($coursesArr)) {
        //     foreach($coursesArr as $k => $val) {
        //         // $videolist[$k]  = CourseVideo::where(['course_id' => $val->id, 'topic_id' => $val->id, ])->get();
        //         $courses[$k] = $val->toArray();
        //         $payments += $val->course_price;
        //     }
        // }

        Session::put('courses', $dataArray);
        Session::put('payments', $payments);

        if (!$request->session()->has('studentsession')) {
            return redirect('/student/log-in');
        }else{
            return $next($request);
        }
    }
}
