<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
Use Image;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('id', 'desc')->get();

        return view('admin/blog/index', compact('blogs'));
    }

    public function store(Request $req)
    {
        $req->validate([
            'heading' => 'required',
            'short_content' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $inputArr = $req->except('_token');
        // Saving Image
        $inputArr['status'] = (! isset($req->status)) ? 0 : 1;
        $inputArr['photo'] = $this->saveImage($req->file('photo'), 'blog/418x346', '418', '346');
        $inputArr['photo'] = $this->saveImage($req->file('photo'), 'blog/740x614', '740', '614');
        $inputArr['date'] = date('M d, Y');
        Blog::create($inputArr);

        return redirect(url("admin/blog"))->with(['message' => 'Blog details added !', 'alert-type' => 'success']);
    }

    public function edit(Request $req, $id)
    {
        $blog = Blog::find($id);

        if($req->isMethod('post')) {
            $req->validate([
                'heading' => 'required',
                'short_content' => 'required',
                'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            $UpdateArr = $req->except('_token');
            $UpdateArr['status'] = (! isset($req->status)) ? 0 : 1;
            $UpdateArr['date'] = date('M d, Y');
            if($req->file('photo')) {
                $UpdateArr['photo'] = $this->saveImage($req->file('photo'), 'blog/418x346', '418', '346');
                $UpdateArr['photo'] = $this->saveImage($req->file('photo'), 'blog/740x614', '740', '614');
            }
            // dd($UpdateArr);
            $blog->update($UpdateArr);

            return redirect(url("admin/blog"))->with(['message' => 'Training Updated !', 'alert-type' => 'success']);
        } else {
            return view('admin/blog/index', compact('blog', 'id'));
        }
    }

    public function delete($id)
    {
        Blog::find($id)->delete();
        
        return back()->with(['message' => 'Blog record Deleted !', 'alert-type' => 'error']);
    }

    public function saveImage($image, $destPath, $w, $h)
    {
        $imgName = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('admin/images/'.$destPath);
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 666, true);
        }
        $imgFile = Image::make($image->getRealPath());
        $imgFile->resize($w, $h, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$imgName);
        
        return $imgName;
    }
}
