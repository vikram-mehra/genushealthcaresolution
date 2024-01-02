<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HR\Candidate;
use App\Models\HR\Company;
use App\Models\HR\AssignInterview;
use App\Models\HrDetail;

class CandidateInterviewController extends Controller
{

    public function index()
    {
        $hrId = \Session::get('hrId');
        
        $candidates = Candidate::whereStatus(1)->get();
        $companies = Company::orderBy('name', 'ASC')->get();
        // $interviewDetails = AssignInterview::with(['candidate' => function($query) use($hrId){
        //                         $query->where('hr_id', $hrId);
        //                     }], 'company')->get();
        $interviewDetails = AssignInterview::with('hr_details', 'candidate', 'company')->get();


        // dd($interviewDetails->toArray());
        return view('hr/candidate/interview', compact('candidates', 'companies', 'interviewDetails'));
    }

    public function assignInterview(Request $req)
    {
        if($req->isMethod('post')) {
            $req->validate([
                'candidate_id' => 'required|numeric',
                'company_id' => 'required|numeric',
                'date' => 'required|date',
                'time' => 'required|date_format:H:i',
            ]);

            $inputArr = $req->except('_token');
            $inputArr['hr_id'] = \Session::get('hrId');

            if(AssignInterview::where(['candidate_id' => $req->candidate_id, 'company_id' => $req->company_id])->exists()) {
                return back()->with(['message' => 'Already applied for this company!', 'alert-type' => 'error']);
            } else {
                AssignInterview::create($inputArr);
            }

            return redirect(url("hr/candidate/interview"))->with(['message' => 'Interview assigned !', 'alert-type' => 'success']);
        }

        $interviewDetails = AssignInterview::get();
        return view('hr/candidate/interview', compact('interviewDetails'));
    }

    public function edit(Request $req, $id)
    {
        $interviewDetail = AssignInterview::with('candidate', 'company')->find($id);

        if($req->isMethod('post')) {
            
            $req->validate([
                'date' => 'required|date',
                'time' => 'required|date_format:H:i',
            ]);
            if (! isset($req->modal)) {
                $req->validate([
                    'candidate_id' => 'required|numeric',
                    'company_id' => 'required|numeric'
                ]);
            }

            $updateArr = $req->except('_token');
            if (isset($req->modal)) {
                $updateArr['status'] = 0;
                unset($updateArr['modal']);
            }
            $updateArr['hr_id'] = \Session::get('hrId');

            if(AssignInterview::where('id', '!=', $id)->where(['candidate_id' => $req->candidate_id, 'company_id' => $req->company_id])->exists()) {
                return back()->with(['message' => 'Already appied for this company!', 'alert-type' => 'error']);
            } else {
                AssignInterview::whereId($id)->update($updateArr);
            }
            

            return redirect(url("hr/candidate/interview"))->with(['message' => 'Interview details Updated !', 'alert-type' => 'success']);
        }
        $hrId = \Session::get('hrId');
        // $candidates = Candidate::where(['status' => 1])->get();
        $candidates = Candidate::whereStatus(1)->get();
        $companies = Company::get();
        return view('hr/candidate/interview', compact('interviewDetail', 'id', 'candidates', 'companies', ));
    }

    public function destroy($id)
    {
        AssignInterview::where(['id' => $id])->delete();
        
        return back()->with(['message' => 'Candidate assigne interview Deleted !', 'alert-type' => 'error']);
    }

    // Assigned Candidate list....

    public function list(Request $req)
    {
        $data['companies'] = Company::orderBy('name','ASC')->get();
        // $data['candidates'] = Candidate::where(['hr_id' => \Session::get('hrId'), 'status' => 1])->get();
        $data['candidates'] = Candidate::whereStatus(1)->orderBy('name','ASC')->get();

        // \DB::enableQueryLog();
        $interview = new AssignInterview;

        $interviewDetails = \DB::table('assign_interviews')
         ->join('companies', 'companies.id', '=', 'assign_interviews.company_id')
         ->join('candidates', 'candidates.id', '=', 'assign_interviews.candidate_id')
         ->join('hr_details', 'hr_details.id', '=', 'assign_interviews.hr_id')
         // ->join('hr_details', 'hr_details.id', '=', 'assign_interviews.status_hr_id')
         ->select('assign_interviews.*','companies.name as companyName', 'candidates.name as name', 'candidates.phone as phone', 'hr_details.name as hrName', 'hr_details.id as hrId')/*->where('assign_interviews.hr_id', \Session::get('hrId'))*/;
         // Filter
        if (isset($req->from_date) && !isset($req->to_date)) {
            $data['from_date'] = $req->from_date;
            $interview = $interview->where("date", '>=', "$req->from_date");
        }if (isset($req->to_date) && !isset($req->from_date)) {
            $interview = $interview->where("date", '<=', "$req->to_date");
            $data['to_date'] = $req->to_date;
        }if (isset($req->to_date) && isset($req->from_date)) {
            $data['from_date'] = $req->from_date;
            $data['to_date'] = $req->to_date;
            $interview = $interview->whereBetween("date", ["$req->from_date", "$req->to_date"]);
            $interviewDetails = $interviewDetails->whereBetween('date',[$req->from_date, $req->to_date]);
        }if (isset($req->candidate_id)) {
            $data['candidateId'] = $req->candidate_id;
            $interviewDetails = $interviewDetails->where('candidates.id', $req->candidate_id);
            $interview = $interview->with(['candidate' => function ($q) use($req) {
                $q->where('candidates.id', $req->candidate_id);
            }]);
        }if (isset($req->company_id)) {
            $data['companyId'] = $req->company_id;
            $interviewDetails = $interviewDetails->where('companies.id', $req->company_id);
            $interview = $interview->with(['company' => function ($q) use($req) {
                $q->where('companies.id', $req->company_id);
            }]);
        }if (isset($req->status)) {
            $data['status'] = $req->status;
            $interviewDetails = $interviewDetails->where('assign_interviews.status', $req->status);
            $interview = $interview->where('status', $req->status);
        }
        if(isset($req->hr_name)){
            $data['hr_name'] = $req->hr_name;
            $interviewDetails = $interviewDetails->where('assign_interviews.hr_id', $req->hr_name);
        }
        // $data['interviewDetails'] = $interview->get();
        $data['interviewDetails']  = $interviewDetails->get();
        $data['hrs']  = HrDetail::get()->keyBy('id');


        // dd($req->all());
        // dd(\DB::getQueryLog());
        // dd($data['interviewDetails']->toArray());
        // dd($interviewDetails->toArray());
        return view('hr/candidate/list', $data);
    }

    public function addCompany(Request $req)
    {
        $c = Company::create(['name' => $req->name]);
        return ['id' => $c->id, 'name' => $req->name];
    }

    public function updateStatus(Request $req)
    {
        if(AssignInterview::find($req->id)->update(['joining_date'=>$req->joining_date, 'status' => $req->status, 'remark' => $req->remark, 'status_hr_id' => \Session::get('hrId')])) {
            // return ['success' => 'Status updated successfully !'];
            return back()->with(['message' => 'Status updated successfully !', 'alert-type' => 'success']);
        } else {
            return back()->with(['message' => 'Some error occured !', 'alert-type' => 'error']);
            // return ['error' => 'Some error occured !'];
        }
    }
}
