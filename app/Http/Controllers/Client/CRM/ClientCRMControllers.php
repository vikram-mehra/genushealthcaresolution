<?php

namespace App\Http\Controllers\Client\CRM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rcm;

class ClientCRMControllers extends Controller
{
    public function Index(){
        $rcm = Rcm::whereStatus(1)->first();

        return view('/client/rcm/rcm', compact('rcm'));
    }
}
