<?php

namespace App\Http\Controllers\Client\Student\Video;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseVideo;
use App\Models\Course;
use App\Models\CourseTopic;

class StudentVideoControllers extends Controller
{
    public function Index()
    {
        return view('client/student/videos/video');
    }

    public function getCourseVideos($subject, $topic)
    {
        $courseVideos = [];
        $course = Course::where('course_name', $subject)->first();
        $topic = CourseTopic::where(['course_id' => $course->id, 'subject_title' => $topic])->first();
        
        if($topic) {
            $courseVideos = CourseVideo::where(['course_id' => $course->id, 'topic_id' => $topic->id, 'status' => 1])->get();
        }

        return view('client/student/videos/learn-with-video', compact('courseVideos'));
    }
}
