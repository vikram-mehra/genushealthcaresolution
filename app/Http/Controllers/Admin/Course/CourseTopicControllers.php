<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;

class CourseTopicControllers extends Controller
{
     public function Index(Request $req){
      $data['courselist'] = DB::table('course')->where('status',1)->get();
      $data['singledata'] = '';
      $data['coursetopiclist'] = DB::table('course_topic')
                                 ->select('course_topic.*')
                                 //->join('course','course_topic.course_id','=','course.id')
                                 ->orderBy('id','DESC')->get();

      if($req->isMethod('post')){
            $validator = Validator::make($req->all(), [ 
                    //'course'            => 'required',
                    'subject_title'     => 'required',
                    'number_of_question'=> 'required',
                    // 'course_price'      => 'required',
                    'course_content'    => 'required',
                ]);

            if ($validator->fails()) { 
                    
                 return redirect()
                        ->back()
                        ->withInput($req->input())
                        ->withErrors($validator->errors());
                }
            if($req->topic_deatil_id){

                $this->Update($req);
                $notification = array(
                        'message' => 'Topic Detail is Updated',
                        'alert-type' => 'success'
                    ); 
                return redirect('admin/course/add-topic-detail')->with($notification);
                
            }else{

                $this->Add($req);
                $notification = array(
                        'message' => 'Topic Detail is Added',
                        'alert-type' => 'success'
                    ); 
                return back()->with($notification); 
            }
        }
        return view('admin/course/addtopicdetail',$data);
    }
    public function Add($req){

        $paramArray = [
                    'course_id'        => $req->course,
                    'subject_title'    => $req->subject_title,
                    'number_of_question'=> $req->number_of_question,
                    // 'course_price'     => $req->course_price,
                    'course_content'   => $req->course_content,
                    'status'           => $req->status?$req->status:0,
                    'created_at'       => date('Y-m-d H:i:s'),
                    ];

        return DB::table('course_topic')->insert($paramArray);
    }
    public function Update($req){

         $paramArray = [
                    'course_id'        => $req->course,
                    'subject_title'    => $req->subject_title,
                    'number_of_question'=> $req->number_of_question,
                    // 'course_price'     => $req->course_price,
                    'course_content'   => $req->course_content,
                    'status'      => $req->status?$req->status:0,
                    'updated_at'  => date('Y-m-d H:i:s'),
                    ];

        return DB::table('course_topic')->where('id',$req->topic_deatil_id)->update($paramArray);
    }
     

    public function GetUpdate($id){
        $data['courselist'] = DB::table('course')->where('status',1)->get();
        $data['coursetopiclist'] = [];
        $data['singledata'] = DB::table('course_topic')->where('id',$id)->first();
        return view('admin/course/addtopicdetail',$data);
    }
    public function Delete($id){

        DB::table('course_topic')->where('id',$id)->delete();
        $notification = array(
                        'message'    => 'Topic Detail is Deleted',
                        'alert-type' => 'error'
                    ); 
        
        return back()->with($notification);
    }
 }
