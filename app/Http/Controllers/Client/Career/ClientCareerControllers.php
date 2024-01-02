<?php

namespace App\Http\Controllers\Client\Career;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Career;

class ClientCareerControllers extends Controller
{
    public function Index()
    {
        $careers = Career::whereStatus(1)->get();

        return view('/client/career/career', compact('careers'));
    }
}
