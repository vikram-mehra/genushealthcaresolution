<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Training;
Use Image;

class TrainingController extends Controller
{
    public function index()
    {
        $trainings = Training::get();

        return view('admin/training/index', compact('trainings'));
    }

    public function store(Request $req)
    {
        $req->validate([
            'heading' => 'required',
            'content' => 'required',
            'short_content' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $inputArr = $req->except('_token');
        // Saving Image
        $inputArr['status'] = (! isset($req->status)) ? 0 : 1;
        $inputArr['photo'] = $this->saveImage($req->file('photo'), 'training/186x184', '186', '184');
        $inputArr['photo'] = $this->saveImage($req->file('photo'), 'training/400x400', '400', '400');
        Training::create($inputArr);

        return redirect(url("admin/training"))->with(['message' => 'Training details added !', 'alert-type' => 'success']);
    }

    public function edit(Request $req, $id)
    {
        if($req->isMethod('post')) {
            $req->validate([
                'heading' => 'required',
                'content' => 'required',
                'short_content' => 'required',
                'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            $UpdateArr = $req->except('_token');
            $UpdateArr['status'] = (! isset($req->status)) ? 0 : 1;
            if($req->file('photo')) {
                $UpdateArr['photo'] = $this->saveImage($req->file('photo'), 'training/186x184', '186', '184');
                $UpdateArr['photo'] = $this->saveImage($req->file('photo'), 'training/400x400', '400', '400');
            }

            Training::find($id)->update($UpdateArr);

            return redirect(url("admin/training"))->with(['message' => 'Training Updated !', 'alert-type' => 'success']);
        } else {
            $training = Training::find($id);

            return view('admin/training/index', compact('training', 'id'));
        }
    }

    public function delete($id)
    {
        Training::find($id)->delete();
        
        return back()->with(['message' => 'Training record Deleted !', 'alert-type' => 'error']);
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
