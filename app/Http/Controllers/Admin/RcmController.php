<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;

class RcmController extends Controller
{
    public function index()
    {
        $aboutUs = AboutUs::first();

        return view('admin/about_us/about-us', compact('aboutUs'));
    }
}
