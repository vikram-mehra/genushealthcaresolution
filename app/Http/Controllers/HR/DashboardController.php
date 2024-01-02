<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HR\Candidate;
use App\Models\HR\AssignInterview;

class DashboardController extends Controller
{
    public function index(Request $req)
    {
        $hrId = \Session::get('hrId');
        $interviews = AssignInterview::where(['hr_id' => $hrId]);

        if($req->has('from_date') && $req->has('to_date')) {
            $interviews = $interviews->whereBetween('date', [$req->from_date, $req->to_date]);
            
        }
        $data['interviews'] = $interviews->get();
        $data['from_date'] = $req->from_date;
        $data['to_date'] = $req->to_date;
        // dd($data['interviews']->toArray());
        return view('hr/dashboard', $data);
    }
}
