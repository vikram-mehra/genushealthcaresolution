<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseAssignTopic;
use App\Models\CourseTopic;
use App\Models\Payment;
use App\Models\Course;
use Validator;

class CourseAssignTopicControllers extends Controller
{
    public function Index(Request $req){
    	
    	if($req->isMethod('post')){
    		if($req->assign_topic_id){
    			 $validator = Validator::make($req->all(), [ 
                    'course_id'  => 'required',
                    'course_topic_id'  => 'required',
                ]);
    		}else{
    			 $validator = Validator::make($req->all(), [ 
                    'course_id'  => 'required',
                    'course_topic_id'  => 'required',
                ]);
    		}

    		if ($validator->fails()) { 
                 return redirect()
                        ->back()
                        ->withInput($req->input())
                        ->withErrors($validator->errors());
                }

             if($req->assign_topic_id){

             	$this->update($req);

             	redirect('/admin/course/assign-topic')->with(['message' => 'Assign Topic Updated !', 'alert-type' => 'success']);
             }else{
             	$this->save($req);
             }
               
    	}

    	$data = [];
    	$singledata = "";

    	$assignTopic = CourseAssignTopic::select('course.course_name','course_assign_topics.*')->join('course','course_assign_topics.course_id','=','course.id')->get();

    	foreach ($assignTopic as $key => $value) {
    		$data[] = $value->course_id;
    	}
    	
    	if(count($data)>0){
    		
    		$course = Course::whereNotIn('id',$data)->where('status',1)->get();
    	}else{
    		$course = Course::where('status',1)->get();
    	}

    	$coursetopics = CourseTopic::where('status',1)->get();

    	
    	return view('admin/course/assigntopic',compact('course','coursetopics','assignTopic','singledata'));
    }

    public function save($req){

    	 $course_topic_id = implode(",", $req->course_topic_id);
    	 \DB::table('course_assign_topics')->insert(['course_id'=>$req->course_id,'course_topic_id'=>$course_topic_id]);
    }	
    public function update($req){
    	$course_topic_id = implode(',', $req->course_topic_id);
    	return 	\DB::table('course_assign_topics')->where('id',$req->assign_topic_id)->update(['course_id'=>$req->course_id,'course_topic_id'=>$course_topic_id]);
    }
    public function getUpdate($id){
    	$data = [];
    	$singledata =CourseAssignTopic::where('id',$id)->first();

    	$coursetopics = CourseTopic::where('status',1)->get();
    	$assignTopic = CourseAssignTopic::select('course.course_name','course_assign_topics.*')->join('course','course_assign_topics.course_id','=','course.id')->get();

    	foreach ($assignTopic as $key => $value) {
    		if($singledata->course_id!=$value->course_id){
    			$data[] = $value->course_id;
    		}
    	}
    	
    	if(count($data)>0){
    		$course = Course::whereNotIn('id',$data)->where('status',1)->get();
    	}else{
    		$course = Course::where('status',1)->get();
    	}

    	return view('admin/course/assigntopic',compact('course','coursetopics','assignTopic','singledata'));
    }

    public static function TOPIC($id){
    	$topicId = explode(',',$id);
    	return CourseTopic::select('subject_title')->whereIn('id',$topicId)->get();
    }

    public function Delete($id){
    	$assigndata = CourseAssignTopic::where('id',$id)->first();
    	$course_id  = $assigndata->course_id;

    	if(Payment::where('course_id',$course_id)->exists()){
    		return back()->with(['message' => 'Topic exists in payment history!', 'alert-type' => 'error']);
    	}else{
    		\DB::table('course_assign_topics')->where('id',$id)->delete();
    		return back()->with(['message' => 'Assign topic deleted!', 'alert-type' => 'success']);
    	}
    }
}
