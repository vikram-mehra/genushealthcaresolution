<?php

namespace App\Http\Controllers\Client\Student\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentProfileControllers extends Controller
{
    public function index(Request $req)
    {
    	$student = Student::find(\Session::get('studentsession')->id);

    	if($req->isMethod('post')) {
    		$req->validate([
	            'name' => 'required',
	            'email'    => 'required',
	            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
	        ]);

	        if(Student::find(\Crypt::decryptString($req->uid))->update(['name' => $req->name, 'phone' => $req->phone])) {
	        	return redirect('student/my-profile')->with(['message' => 'Profile updated successfully!', 'alert-type' => 'success']);
	        }
	        
	        return back()->with(['message' => 'Some error occured!', 'alert-type' => 'error']);

    	}

        return view('client/student/profile/my_profile', compact('student'));
    }
}
