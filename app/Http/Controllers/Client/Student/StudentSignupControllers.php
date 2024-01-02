<?php

namespace App\Http\Controllers\Client\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Crypt;
use Validator;
use DB;

class StudentSignupControllers extends Controller
{
    public function Index(Request $req){
        $data['error'] = '';

        if($req->isMethod('post')){
            $validator = Validator::make($req->all(), [ 
                    'name'             => 'required|min:3',
                    'email'            => 'required|email',
                    'phone'            => 'required|min:10|max:10' ,
                    'password'         => 'required| min:6|same:confirm_password',
                    'confirm_password' => 'required'
                ]);

            if ($validator->fails()) { 
                    
                    return redirect()
                        ->back()
                        ->withInput($req->input())
                        ->withErrors($validator->errors());
                }

            if(DB::table('tbl_student')->where('phone',$req->phone)->exists()){
                 $data['error'] = "Mobile already exists";
                 return view('client/student/sign_up',$data);
            }if(DB::table('tbl_student')->where('email',$req->email)->exists()){
                 $data['error'] = "Email already exists";
                 return view('client/student/sign_up',$data);
            }else{

                $paramArray = [
                        'name'       => $req->name,
                        'email'      => $req->email,
                        'phone'      => $req->phone,
                        'password'   => Crypt::encryptString($req->password),
                        'status'     => 1,
                        'created_at' => date('Y-m-d H:i:s')
                        ];

                $insert = DB::table('tbl_student')->insert($paramArray);

                if($insert){

                    $notification = array(
                        'message' => 'The student has registered successfully.!',
                        'alert-type' => 'success'
                    );
                    
                    return  redirect('/student/log-in')->with($notification);
                }
           }
        }
        return view('client/student/sign_up',$data);
    }
}
