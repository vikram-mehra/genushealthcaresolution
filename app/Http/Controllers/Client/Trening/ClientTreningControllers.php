<?php

namespace App\Http\Controllers\Client\Trening;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientTreningControllers extends Controller
{
    public function MedicalBilling(){
        return view('client/trening/medical_billing_ar');
    }
    public function MedicalCoding(){
        return view('client/trening/medical_coding');
    }
    public function OnJob(){
        return view('client/trening/on_job_training');
    }
    public function ClaimAdjudication(){
        return view('client/trening/claims_adjudication');
    }
       
}
