<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;

class CourseControllers extends Controller
{
    public function Index(Request $req){
        $data['singledata'] = '';
        $data['courselist'] = DB::table('course')->orderBy('id','DESC')->get();

        if($req->isMethod('post')){
            $validator = Validator::make($req->all(), [ 
                    'course_name'  => 'required',
                    'course_price'  => 'required',
                ]);

            if ($validator->fails()) { 
                    
                 return redirect()
                        ->back()
                        ->withInput($req->input())
                        ->withErrors($validator->errors());
                }
            if($req->course_id){

                $this->Update($req);
                $notification = array(
                        'message' => 'Course is Updated',
                        'alert-type' => 'success'
                    ); 
                return redirect('/admin/course/add-course')->with($notification);
                
            }else{

                $this->Add($req);
                $notification = array(
                        'message' => 'Course is Added',
                        'alert-type' => 'success'
                    ); 
                return back()->with($notification); 
            }
        }
        return view('admin/course/addcourse',$data);
    }

    public function Add($req){

        $paramArray = [
                    'course_name'  => $req->course_name,
                    'course_price' => $req->course_price,
                    'status'       => $req->status?$req->status:0,
                    'show_home'    => $req->show_home?$req->show_home:0,
                    'created_at'   => date('Y-m-d H:i:s'),
                    ];

        return DB::table('course')->insert($paramArray);
    }
    public function Update($req){
        
         $paramArray = [
                    'course_name' => $req->course_name,
                    'course_price' => $req->course_price,
                    'status'      => $req->status?$req->status:0,
                    'show_home'    => $req->show_home?$req->show_home:0,
                    'updated_at'  => date('Y-m-d H:i:s'),
                    ];

        return DB::table('course')->where('id',$req->course_id)->update($paramArray);
    }
     

    public function GetUpdate($id){
        $data['courselist'] = [];
        $data['singledata'] = DB::table('course')->where('id',$id)->first();
        return view('admin/course/addcourse',$data);
    }
    public function Delete($id){
        DB::table('course')->where('id',$id)->delete();
        $notification = array(
                        'message' => 'Course is Deleted',
                        'alert-type' => 'error'
                    ); 
        
        return back()->with($notification);
    }
}
