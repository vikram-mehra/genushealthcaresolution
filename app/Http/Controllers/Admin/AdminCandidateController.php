<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Company;
use App\Models\HR\AssignInterview;
use App\Models\HrDetail;

class AdminCandidateController extends Controller
{
    public function add(Request $req)
    {
        $candidates = Candidate::with('hr_details')->get();

        return view('admin/candidate/add', compact('candidates'));
    }

    public function destroy($id)
    {
        Candidate::where(['id' => $id])->delete();
        
        return back()->with(['message' => 'Candidate record Deleted !', 'alert-type' => 'error']);
    }

    public function list(Request $req)
    {
        $data['companies'] = Company::get();
        // $data['candidates'] = Candidate::where(['hr_id' => \Session::get('hrId'), 'status' => 1])->get();
        $data['candidates'] = Candidate::whereStatus(1)->get();

        // \DB::enableQueryLog();
        $interview = new AssignInterview;

        $interviewDetails = \DB::table('assign_interviews')
         ->join('companies', 'companies.id', '=', 'assign_interviews.company_id')
         ->join('candidates', 'candidates.id', '=', 'assign_interviews.candidate_id')
         ->join('hr_details', 'hr_details.id', '=', 'assign_interviews.hr_id')
         // ->join('hr_details', 'hr_details.id', '=', 'assign_interviews.status_hr_id')
         ->select('assign_interviews.*','companies.name as companyName', 'candidates.name as name', 'candidates.phone as phone', 'hr_details.name as hrName', 'hr_details.id as hrId');
         // ->where("assign_interviews.hr_id", 10);
         // Filter
        if (isset($req->hr_id)) {
            $data['hr_id'] = $req->hr_id;
            $interviewDetails = $interviewDetails->where("assign_interviews.hr_id", $req->hr_id);
        }if (isset($req->from_date) && !isset($req->to_date)) {
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

        // $data['interviewDetails'] = $interview->get();
        $data['interviewDetails']  = $interviewDetails->get();
        $data['hrs']  = HrDetail::get()->keyBy('id');
        $data['hrDetails']  = HrDetail::get();

        // dd($data['hrDetails']->toArray());
        // dd(\DB::getQueryLog());
        // dd($data['interviewDetails']->toArray());
        // dd($interviewDetails->toArray());
        return view('admin/candidate/list', $data);
    }
}
