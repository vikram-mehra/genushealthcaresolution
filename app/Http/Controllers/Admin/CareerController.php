<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Career;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::get();

        return view('admin/career/career', compact('careers'));
    }

    public function store(Request $req)
    {
        $req->validate([
            'heading' => 'required',
            'experience' => 'required',
            'location' => 'required',
            'email' => 'required',
        ]);

        $inputArr = $req->except('_token');

        if(! isset($req->status)) {
            $inputArr['status'] = 0;  
        } else {
              $inputArr['status'] = 1;
        }

        Career::create($inputArr);

        return redirect(url("admin/careers"))->with(['message' => 'Team details added !', 'alert-type' => 'success']);
    }

    public function edit(Request $req, $id)
    {
        if($req->isMethod('post')) {
            $req->validate([
                'heading' => 'required',
                'experience' => 'required',
                'location' => 'required',
                'email' => 'required',
            ]);

            $UpdateArr = $req->except('_token');
            if(! isset($req->status)) {
                $UpdateArr['status'] = 0;  
            } else {
                  $UpdateArr['status'] = 1;
            }
            // dd($UpdateArr);
            Career::find($id)->update($UpdateArr);

            return redirect(url("admin/careers"))->with(['message' => 'Career Updated !', 'alert-type' => 'success']);
        } else {
            $career = Career::find($id);

            return view('admin/career/career', compact('career', 'id'));
        }
    }

    public function delete($id)
    {
        Career::find($id)->delete();
        
        return back()->with(['message' => 'Career Deleted !', 'alert-type' => 'error']);
    }
}
