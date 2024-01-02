<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index(Request $req)
    {
        $payments = Payment::with('course', 'student')->get();
        $from = $to = '';
        if (isset($req->from) && isset($req->to)) {
            $payments = $payments->where("date", '>=', "$req->from")->where("date", '<=', "$req->to");
            $from = $req->from;
            $to = $req->to;
        }

        return view('admin/payment/payment_history', compact('payments', 'from', 'to'));
    }
}
