<?php

namespace App\Http\Controllers\Client\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Validator;
use Session;
use DB;

class StudentLoginControllers extends Controller
{
    public function Index(Request $req){
        $data = array();
            if($req->isMethod('post')){

                $validator = Validator::make($req->all(), [ 
                    'email' => 'required|email', 
                    'password' => 'required', 
                ]);

                if ($validator->fails()) { 
                    return redirect()
                        ->back()
                        ->withInput($req->input())
                        ->withErrors($validator->errors());
                }
   
                $user = DB::table('tbl_student')->where(['email'=>$req->email])->first();
                
                if($user) {
                    if($user->status == 1) {
                        if(Crypt::decryptString($user->password)==$req->password){
                            $req->session()->put('studentsession', $user);
                            // Redirecting on payment page
                            if ($req->session()->has('buyCourseUrl')) {
                                return redirect(Session::get('buyCourseUrl'));
                            }
                            
                            return  redirect('student/dashboard');
                        }else{
                            $data['error'] = "Password does not match";
                        }
                    } else {
                        $data['error'] = "Your account is not active! Please contact your admin.";
                    }
                }else{
                    $data['error'] = "Username and Password is not matched";
                }
            }

            if(session()->has('studentsession')){
                return  redirect('student/dashboard');
            }else{
                return view('client/student/log_in', ['data'=>$data]);
            }
    }

    public function logout(Request $request){
            $request->session()->flush();
            return redirect('/');
    }
}
