<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;

class CourseVideoControllers extends Controller
{
    public function Index(Request $req){
        $data['courselist']  = DB::table('course')->where('status',1)->get();
        $data['singledata']  = '';
        $data['topiclist']   =[];
        $data['videolist']   = DB::table('course_video')
                                ->select('course_video.*','course.course_name','course_topic.subject_title')
                                ->join('course','course_video.course_id','=','course.id')
                                ->join('course_topic','course_video.topic_id','=','course_topic.id')
                                ->get();


      if($req->isMethod('post')){

            $validator = Validator::make($req->all(), [ 
                    'course'    => 'required',
                    'topic'     => 'required',
                ]);

            if ($validator->fails()) { 
                    
                 return redirect()
                        ->back()
                        ->withInput($req->input())
                        ->withErrors($validator->errors());
                }

             
            if($req->video_id){

                $this->Update($req);
                $notification = array(
                        'message' => 'Video is Updated',
                        'alert-type' => 'success'
                    ); 
                return redirect('admin/add-video')->with($notification);
                
            }else{

                $this->Add($req);
                $notification = array(
                        'message' => 'Video is Added',
                        'alert-type' => 'success'
                    ); 
                return back()->with($notification); 
            }
        }
        return view('admin/course/add_video',$data);
    }
    public function Add($req){
        $uploadvideod_data = '';

        if($req->hasFile('upload_video')){
            $uploadvideo = $this->videoupload($req->upload_video);
            $uploadvideod_data = $uploadvideo['course_video'];
        }

        $paramArray = [
                        'course_id'   => $req->course,
                        'topic_id'    => $req->topic,
                        'name'    => $req->name,
                        'video_link'  => $req->video_link,
                        'video_vemio' => $req->video_vimeo,
                        'upload_video'=> $uploadvideod_data,
                        'status'      => $req->status?$req->status:0,
                        'created_at'  => date('Y-m-d H:i:s'),
                    ];

        return DB::table('course_video')->insert($paramArray);
    }

    public function Update($req){
        if($req->hasFile('upload_video')){
            $uploadvideo = $this->videoupload($req->upload_video);
            $uploadvideod_data = $uploadvideo['course_video'];
            if($req->oldupload_video){
                if (file_exists(public_path($req->oldupload_video))){
                    unlink(public_path($req->oldupload_video));
                }
            }
        }else{
            $uploadvideod_data = $req->oldupload_video;
        }
         $paramArray = [
                        'course_id'   => $req->course,
                        'topic_id'    => $req->topic,
                        'name'    => $req->name,
                        'video_link'  => $req->video_link,
                        'video_vemio' => $req->video_vimeo,
                        'upload_video'=> $uploadvideod_data,
                        'status'      => $req->status?$req->status:0,
                        'updated_at'  => date('Y-m-d H:i:s'),
                    ];
        
        return DB::table('course_video')->where('id',$req->video_id)->update($paramArray);
    }
     

    public function GetUpdate($id){
        $data['videolist'] = [];
        $coursedata  = DB::table('course')->where('status',1)->get();
        $data['courselist'] = $coursedata;
        
        $coursesingledata = DB::table('course_video')->where('id',$id)->first();
        $data['singledata'] = $coursesingledata;
        $data['topiclist']  = DB::table('course_topic')->where(['status'=>1,'course_id'=>$coursesingledata->course_id])->get();
        return view('admin/course/add_video',$data);
    }
    public function Delete($id){
        $videoData = DB::table('course_video')->where('id',$id)->first();

        DB::table('course_video')->where('id',$id)->delete();

        if($videoData->upload_video){
                if (file_exists(public_path($videoData->upload_video))){
                    unlink(public_path($videoData->upload_video));
                }
            }
        $notification = array(
                        'message'    => 'Video is Deleted',
                        'alert-type' => 'error'
                    ); 
        
        return back()->with($notification);
    }

    public function GetAjaxTopic(Request $req){
        return DB::table('course_topic')->select('id','subject_title')->where(['course_id' => $req->course_id,'status' => 1])->get();
    }

    public function videoupload($file){
        
        $imagemove  = $file;
        $image_name = time() .rand(1, 100).'.' . $imagemove->getClientOriginalExtension();

        $destinationPath              =   public_path('/course_video');
        $imagesave['course_video']  =   'course_video/' . $image_name;
        $imagemove->move($destinationPath,$image_name);

        return $imagesave;
   }
}
