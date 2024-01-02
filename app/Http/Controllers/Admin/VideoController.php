<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::get();

        return view('admin/video/index', compact('videos'));
    }

    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'link' => 'required',
            // 'link' => 'required|regex:/(https?\/\/)(player.|www.)?(vimeo\.com|youtu(be\.com|\.be|be\.googleapis\.com))\/(video\/|embed\/|watch\?v=|v\/)?([A-Za-z0-9._%-]*)(\&\S+)?/',
        ]);
        $inputArr = $req->except('_token');
        $inputArr['isHome'] = (! isset($req->isHome)) ? 0 : 1;
        Video::create($inputArr);

        return redirect(url("admin/video"))->with(['message' => 'Video added !', 'alert-type' => 'success']);
    }

    public function edit(Request $req, $id)
    {
        $video = Video::find($id);

        if($req->isMethod('post')) {
            $req->validate([
                'name' => 'required',
                'link' => 'required|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            ]);
            $updateArr = $req->except('_token');
            $updateArr['isHome'] = (! isset($req->isHome)) ? 0 : 1;
            $video->update($updateArr);

            return redirect(url("admin/video"))->with(['message' => 'Video Updated !', 'alert-type' => 'success']);
        }

        return view('admin/video/index', compact('video', 'id'));
    }

    public function delete($id)
    {
        Video::find($id)->delete();
        
        return back()->with(['message' => 'Video Deleted !', 'alert-type' => 'error']);
    }
}
