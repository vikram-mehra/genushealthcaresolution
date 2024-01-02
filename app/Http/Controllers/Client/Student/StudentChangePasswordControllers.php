<?php

namespace App\Http\Controllers\Client\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentChangePasswordControllers extends Controller
{
    public function index(Request $req)
    {
        $user = Student::find(\Session::get('studentsession')->id);
        
        if($req->isMethod('post')) {
            $req->validate([
                'current_password' => [
                    'required',
                    function ($attribute, $value, $fail) use ($user, $req) {
                        // if (! \Hash::check($value, $user->password)) {
                        if (\Crypt::decryptString($user->password) != $req->current_password) {
                            $fail('Your password was not updated, since the provided current password does not match.');
                        }
                    }
                ],
                'new_password' => 'required|different:current_password',
                'confirm_password' => 'required|same:new_password',
            ]);

            $user->update(['password' => \Crypt::encryptString($req->new_password)]);

            return  back()->with(['message' => "Password updated successfully!", 'alert-type' => 'success']);
        }

        return view('client/student/change_password');
    }
}
