<?php

namespace App\Http\Controllers\Admin\Register;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Models\HrDetail;

class HrController extends Controller
{
    // Header
    public function index()
    {
        return view('admin/hr/add');
    }

    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'email'    => 'required|email|unique:hr_details,email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'password' => 'required|string|min:3|max:20',
            'confirm_password' => 'required|same:password'
        ]);

        $inputArr = $req->except('_token');
        $inputArr['password'] = Crypt::encryptString($req->password);

        HrDetail::create($inputArr);

        return redirect(url("admin/hr/list"))->with(['message' => 'Hr details added !', 'alert-type' => 'success']);
    }

    public function list()
    {
        $hrDetails = HrDetail::get();

        return view('admin/hr/list', compact('hrDetails'));
    }

    public function edit (Request $req, $id)
    {
        $hrDetails = HrDetail::find($id);

        if($req->isMethod('post')) {
            $req->validate([
                'name' => 'required',
                'email'    => 'required|email|unique:hr_details,email,'.$id,
                'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'password' => 'required|string|min:3|max:20',
                'confirm_password' => 'required|same:password'
            ]);

            $UpdateArr = $req->except('_token');
            $UpdateArr['password'] = Crypt::encryptString($req->password);

            $hrDetails->update($UpdateArr);

            return redirect(url("admin/hr/list"))->with(['message' => 'HR Details Updated !', 'alert-type' => 'success']);
        } else {
            return view('admin/hr/add', compact('hrDetails', 'id'));
        }
    }

    public function destroy($id)
    {
        HrDetail::find($id)->delete();
        
        return back()->with(['message' => 'HR record Deleted !', 'alert-type' => 'error']);
    }
}
