<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HR\Candidate;

class CandidateController extends Controller
{
    public function index(Request $req)
    {
        // $candidates = Candidate::whereStatus(1)->get();
        $candidates = Candidate::with('hr_details')->get();
        if($req->has('page')) {
            dd($req->all());
        }
        // dd($candidates->toArray());
        return view('hr/candidate/list', compact('candidates'));
    }

    public function add(Request $req)
    {
        $hrId = \Session::get('hrsession')->id;

        if($req->isMethod('post')) {
            $req->validate([
                'name' => 'required',
                'email' => 'required|email|unique:candidates,email',
                'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|digits:10|unique:candidates,phone',
                'dob' => 'required|date',
                // 'pan_no' => 'required|regex:/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/',
                'current_location' => 'required',
                'resume' => 'required|max:10000|mimes:doc,docx,pdf'
            ]);
            if($req->pan_no != '') {
                $req->validate(['pan_no' => 'required|regex:/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/']);
            }

            $inputArr = $req->except('_token');
            // Saving Resume
            $inputArr['status'] = (! isset($req->status)) ? 0 : 1;
            $inputArr['resume'] = $this->saveResume($req, 'candidate', '', '');
            $inputArr['hr_id'] = $hrId;
            Candidate::create($inputArr);

            return redirect(url("hr/candidate/add"))->with(['message' => 'Candidates details added !', 'alert-type' => 'success']);
        }

        // $candidates = Candidate::whereHrId($hrId)->get();
        $candidates = Candidate::with('hr_details')->paginate(10);
        
        return view('hr/candidate/add', compact('candidates'));
    }

    public function edit(Request $req, $id)
    {
        $candidate = Candidate::find($id);

        if($req->isMethod('post')) {
            $req->validate([
                'name' => 'required',
                'email' => 'required|email|unique:candidates,email,'.$id,
                'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10|unique:candidates,phone,'.$id,
                'dob' => 'required|date',
                // 'pan_no' => 'required|regex:/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/',
                'current_location' => 'required',
                'resume' => 'max:2000|mimes:doc,docx,pdf,jpg'
            ]);
            if($req->pan_no != '') {
                $req->validate(['pan_no' => 'required|regex:/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/']);
            }

            $updateArr = $req->except('_token');
            // Saving Resume
            $updateArr['status'] = (! isset($req->status)) ? 0 : 1;
            $updateArr['hr_id'] = \Session::get('hrsession')->id;
            if($req->file('resume')) {
                @unlink(public_path('hr/resume/candidate/'.$candidate->resume));
                $updateArr['resume'] = $this->saveResume($req, 'candidate', '', '');
            }
            $candidate->update($updateArr);

            return redirect(url("hr/candidate/add"))->with(['message' => 'Candidates details Updated !', 'alert-type' => 'success']);
        }

        return view('hr/candidate/add', compact('candidate', 'id'));
    }

    public function destroy($id)
    {
        Candidate::where(['id' => $id])->delete();
        
        return back()->with(['message' => 'Candidate record Deleted !', 'alert-type' => 'error']);
    }

    public function saveResume($req, $destPath, $w, $h)
    {
        $fileName = time().'.'.$req->file('resume')->getClientOriginalExtension();
        try{

            $destinationPath = public_path('hr/resume/'.$destPath);
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 666, true);
            }
            
            $req->file('resume')->move($destinationPath, $fileName);
            
            return $fileName;

        }catch(\Exception $e){
            $rent = "resume failed";
         return $rent;

        }
       
    }
    public function downloadResume(Request $req){
        try{
            $pathOfFile = public_path('hr/resume/candidate/'.$req->resume);
                return response()->download($pathOfFile);
            }   
            catch(\Exception $e){
                return back()->with(['message' => 'File Not Found Exception !', 'alert-type' => 'error']);
            }    
    }
}
