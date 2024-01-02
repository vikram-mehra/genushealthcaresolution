<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth; 
use Validator;
use Session;

class AdminAtuthControllers extends Controller
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
   
                $user = User::where(['email'=>$req->email])->first();
                if($user) {
                     if(!Hash::check($req->password, $user->password)){
                            $data['error'] = "Password does not match";
                        }else{
                            $req->session()->put('adminsession', $user);
                            
                            return  redirect('admin/dashboard');
                        }
                }else{
                    $data['error'] = "Username and Password is not matched";
                }
            }

             if(session()->has('adminsession')){
                return  redirect('admin/dashboard');
            }else{
                return view('admin/login', ['data'=>$data]);
            }
    }

    public function logout(Request $request){
            $request->session()->flush();
            return redirect('/admins-login');
    }
}
