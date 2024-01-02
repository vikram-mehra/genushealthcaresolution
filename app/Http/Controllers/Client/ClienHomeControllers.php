<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Header;
use App\Models\Client;
use App\Models\Course;
use App\Models\CompanyDetail;
use App\Models\Blog;
use App\Models\Training;
use App\Models\Video;

class ClienHomeControllers extends Controller
{
    public function Index()
    {
        $data['headers'] = Header::whereStatus(1)->get();
        $data['courses'] = Course::with('course_topic')->where('show_home',1)->whereStatus(1)->get();
        $data['companyDetails'] = CompanyDetail::whereStatus(1)->get();
        $data['blogs'] = Blog::whereStatus(1)->limit(2)->get();
        $data['clients'] = Client::whereStatus(1)->get();
        $data['company'] = CompanyDetail::whereId(1)->first();
        $data['trainings'] = Training::whereStatus(1)->get();
        $data['videos'] = Video::where(['isHome' => 1])->limit(3)->get();
        // dd($data['blogs']->toArray());
        return view('client/home', $data);
    }
}
