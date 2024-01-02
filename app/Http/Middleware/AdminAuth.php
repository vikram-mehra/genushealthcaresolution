<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Payment;
use Session;

class AdminAuth
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
        // $where['status'] = 1;
        // $courses = [];
        // // Getting all courses here...
        // // $courses = Course::with('course_topic')->whereStatus(1)->get();
        // if ($request->session()->has('studentsession')) {
        //     $where['student_id'] = $request->session()->get('studentsession')->id;
        // }
        
        // $coursesArr = Payment::with(['course' => function($q) {
        //                 $q->with('course_topic');
        //             }])->where($where)->get()->pluck('course');

        // if(! empty($coursesArr)) {
        //     foreach($coursesArr as $k => $val) {
        //         // $videolist[$k]  = CourseVideo::where(['course_id' => $val->id, 'topic_id' => $val->id, ])->get();
        //         $courses[$k] = $val->toArray();
        //     }
        // }
        // Session::put('courses', $courses);
        
        if (!$request->session()->has('adminsession')) {
            return redirect('/admins-login');
        }else{
              return $next($request);
        }
    }
}
