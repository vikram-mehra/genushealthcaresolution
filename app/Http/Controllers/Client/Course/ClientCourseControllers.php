<?php

namespace App\Http\Controllers\Client\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class ClientCourseControllers extends Controller
{
    public function Index($subject)
    {
        $course = Course::with('course_topic')->where(['course_name' => ucfirst($subject)])->first();
        
        return view('/client/course/math', compact('course'));
    }
}
