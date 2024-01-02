<?php

namespace App\Http\Controllers\Client\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;
use App\Models\TeamDetail;

class ClientAboutControllers extends Controller
{
    public function Index()
    {
        $aboutUs = AboutUs::first();
        $teamDetails = TeamDetail::whereStatus(1)->get();

        return view('/client/about/about', compact('aboutUs', 'teamDetails'));
    }
}
