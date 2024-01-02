<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Validator;
use DB;
use App\Models\HrDetail;

class HrAuthController extends Controller
{
     public function index(Request $req)
     {
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

            $user = DB::table('hr_details')->where(['email'=>$req->email])->first();
            if($user) {
                if(Crypt::decryptString($user->password)==$req->password){
                    $req->session()->put('hrsession', $user);
                    $req->session()->put('hrId', $user->id);
                    $req->session()->put('hrName', $user->name);
                    return  redirect('hr/dashboard');
                }else{
                    $data['error'] = "Password does not match";
                }
            }else{
                $data['error'] = "Username and Password is not matched";
            }
        }

        if(session()->has('hrsession')){
            return  redirect('hr/dashboard');
        }else{
            return view('hr/auth/login', ['data'=>$data]);
        }
    }

    public function logout(Request $request)
    {
            $request->session()->flush('hrsession');
            return redirect('/hr/login');
    }

    public function changePassword(Request $req)
    {
        if($req->isMethod('post')) {
            $req->validate([
                'current_password' => 'required',
                'new_password' => 'required|different:current_password',
                'confirm_password' => 'required|same:new_password'
            ]);

            $user = HrDetail::find(\Session::get('hrsession')->id);
            
            if(Crypt::decryptString($user->password) == $req->current_password) {
                $user->update(['password' => Crypt::encryptString($req->new_password)]);

                return  redirect('hr/change-password')->with(['message' => "Password updated successfully!", 'alert-type' => 'success']);
            } else {
                return  redirect('hr/change-password')->with(['message' => "Current password is incorrect!", 'alert-type' => 'error']);
            }
        }

        return view('hr/auth/change-password');
    }
}
