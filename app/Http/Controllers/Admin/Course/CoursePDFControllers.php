<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;
use App\Models\CourseTopic;

class CoursePDFControllers extends Controller
{
    public function Index(Request $req){
        $data['courselist']  = DB::table('course')->where('status',1)->get();
        $data['singledata']  = '';
        $data['topiclist']   = CourseTopic::where('status',1)->get();
        $data['pdflist']     = DB::table('course_pdf')
                                ->select('course_pdf.*','course.course_name','course_topic.subject_title')
                                ->leftJoin('course_topic','course_pdf.topic_id','=','course_topic.id')
                                ->leftJoin('course','course_topic.course_id','=','course.id')
                                ->get();


        if($req->isMethod('post')){
            if($req->pdf_id){
                $validator = Validator::make($req->all(), [ 
                        'topic'     => 'required',
                    ]);
            }else{
                $validator = Validator::make($req->all(), [ 
                        'topic'     => 'required',
                        'course_pdf'=> 'required',
                    ]);
            }
            if ($validator->fails()) { 
                    
                return redirect()
                    ->back()
                    ->withInput($req->input())
                    ->withErrors($validator->errors());
            }

                
            if($req->pdf_id){

                $this->Update($req);
                $notification = array(
                        'message' => 'PDF is Updated',
                        'alert-type' => 'success'
                    ); 
                return redirect('admin/add-pdf')->with($notification);
                
            }else{

                $this->Add($req);
                $notification = array(
                        'message' => 'PDF is Added',
                        'alert-type' => 'success'
                    ); 
                return back()->with($notification); 
            }
        }

        return view('admin/course/add_pdf',$data);
    }

    public function Add($req){
        $uploadpdf_data = '';
        if($req->hasFile('course_pdf')){
            $uploadpdf = $this->pdfupload($req->course_pdf);
            $uploadpdf_data = $uploadpdf['course_pdf'];
        }

        $paramArray = [
                        'topic_id'    => $req->topic,
                        'name'        => $req->name,
                        'course_pdf'  => $uploadpdf_data,
                        'status'      => $req->status?$req->status:0,
                        'expiry_days' => $req->expiry_days,
                        'created_at'  => date('Y-m-d H:i:s'),
                    ];

        return DB::table('course_pdf')->insert($paramArray);
    }

    public function Update($req){
        if($req->hasFile('course_pdf')){
            $uploadpdf = $this->pdfupload($req->course_pdf);
            $uploadpdf_data = $uploadpdf['course_pdf'];
            if($req->old_pdf){
                if (file_exists(public_path($req->old_pdf))){
                    unlink(public_path($req->old_pdf));
                }
            }
        }else{
            $uploadpdf_data = $req->old_pdf;
        }
         $paramArray = [
                        'topic_id'    => $req->topic,
                        'name'        => $req->name,
                        'course_pdf'  => $uploadpdf_data,
                        'status'      => $req->status?$req->status:0,
                        'expiry_days' => $req->expiry_days,
                        'updated_at'  => date('Y-m-d H:i:s'),
                    ];
        
        return DB::table('course_pdf')->where('id',$req->pdf_id)->update($paramArray);
    }
     

    public function GetUpdate($id){
        $data['pdflist'] = [];
        $coursedata  = DB::table('course')->where('status',1)->get();
        $data['courselist'] = $coursedata;
        
        $coursesingledata = DB::table('course_pdf')->where('id',$id)->first();
        $data['singledata'] = $coursesingledata;
        $data['topiclist']  = DB::table('course_topic')->where(['status'=>1,'id'=>$coursesingledata->topic_id])->get();
        return view('admin/course/add_pdf',$data);
    }
    public function Delete($id){
        $pdfData = DB::table('course_pdf')->where('id',$id)->first();

        DB::table('course_pdf')->where('id',$id)->delete();
        if($pdfData->course_pdf!=''){
            if (file_exists(public_path($pdfData->course_pdf))){
                unlink(public_path($pdfData->course_pdf));
            }
        }
        $notification = array(
                        'message'    => 'PDF is Deleted',
                        'alert-type' => 'error'
                    ); 
        
        return back()->with($notification);
    }
    public function pdfupload($file){
        
        $imagemove  = $file;
        $image_name = time() .rand(1, 100).'.' . $imagemove->getClientOriginalExtension();

        $destinationPath              =   public_path('/course_pdf');
        $imagesave['course_pdf']  =   'course_pdf/' . $image_name;
        $imagemove->move($destinationPath,$image_name);

        return $imagesave;
   }
}
