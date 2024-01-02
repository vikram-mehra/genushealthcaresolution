<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Validator;
use DB;

class ForgotPasswordController extends Controller
{
    public function Index(Request $req){
        $data = array();
            if($req->isMethod('post')){

                $validator = Validator::make($req->all(), [ 
                    'email' => 'required|email', 
                ]);

                if ($validator->fails()) { 
                    return redirect()
                        ->back()
                        ->withInput($req->input())
                        ->withErrors($validator->errors());
                }

                if($req->isMethod('post')){
                    $user = DB::table('tbl_student')->where(['email'=>$req->email])->first();
                    if($user) {
                          $password = Crypt::decryptString($user->password);
                          $email = 'info@genushealthcaresolution.com ';
                          $to = $user->email;
                          $subject = "Genus Healthcare Solution";
                          $htmlContent  = "<h5>Hello, ".$user->name."</h5><br><p>Your password is <b>".$password."</b></p>";
                          $headers = "MIME-Version: 1.0" . "\r\n"; 
                          $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
                          $headers .= 'From: genushealthcaresolution<'.$email.'>' . "\r\n"; 

                          try{
                                mail($to, $subject, $htmlContent, $headers);
                                $data['succ'] = "The password has been sent successfully";
                          }catch(\Exception $e){
                               $data['error'] = "This server does not support.";
                          }
                    }else{
                        $data['error'] = "Email does not exist.";
                    }
                }
            }
        return view('client.student.forgotpassword', ['data'=>$data]);
    }
}
