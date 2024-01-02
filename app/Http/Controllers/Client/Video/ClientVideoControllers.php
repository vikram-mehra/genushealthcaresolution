<?php

namespace App\Http\Controllers\Client\Video;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;

class ClientVideoControllers extends Controller
{
    public function Index()
    {
        $videos = Video::where('isHome', 1)->get();

        return view('/client/videos/videos', compact('videos'));
    }
}
