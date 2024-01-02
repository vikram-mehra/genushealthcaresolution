<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;
use App\Models\TeamDetail;
use Image;

class AboutUsController extends Controller
{
    public function index()
    {
        $aboutUs = AboutUs::first();

        return view('admin/about_us/about-us', compact('aboutUs'));
    }

    public function update(Request $req)
    {
        $req->validate([
            'content' => 'required',
        ]);

        AboutUs::find($req->id)->update(['content' => $req->content]);

        return redirect(url("admin/about-content/"))->with(['message' => 'About Us content updated!', 'alert-type' => 'success']);
    }

    public function teamIndex()
    {
        $teamDetails = TeamDetail::get();

        return view('admin/team/team', compact('teamDetails'));
    }

    public function saveTeamDetails(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'designation' => 'required',
            'content' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $inputArr = $req->except('_token');
        // dd($req->except('_token'));
        if(! isset($req->status)) {
            $inputArr['status'] = 0;  
        } else {
              $inputArr['status'] = 1;
        }
        // Saving Image...
        $image = $req->file('photo');
        $imgName = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('team/images');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 666, true);
        }
        $imgFile = Image::make($image->getRealPath());
        $imgFile->resize(480, 480, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$imgName);
        $inputArr['photo'] = $imgName;

        TeamDetail::create($inputArr);

        return redirect(url("admin/team-details"))->with(['message' => 'Team details added !', 'alert-type' => 'success']);
    }

    public function editTeamDetail(Request $req, $id)
    {
        if($req->isMethod('post')) {
            $req->validate([
                'name' => 'required',
                'designation' => 'required',
                'content' => 'required',
                'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            $UpdateArr = $req->except('_token');
            if(! isset($req->status)) {
                $UpdateArr['status'] = 0;  
            } else {
                  $UpdateArr['status'] = 1;
            }

            if($req->file('photo')) {
                // Saving Image...
                $image = $req->file('photo');
                $imgName = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('team/images');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 666, true);
                }
                $imgFile = Image::make($image->getRealPath());
                $imgFile->resize(480, 480, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$imgName);
                $UpdateArr['photo'] = $imgName;
            }

            TeamDetail::find($id)->update($UpdateArr);

            return redirect(url("admin/team-details"))->with(['message' => 'Team details Updated !', 'alert-type' => 'success']);
        } else {
            $teamDetail = TeamDetail::find($id);

            return view('admin/team/team', compact('teamDetail', 'id'));
        }
    }

    public function deleteTeamDetail($id)
    {
        TeamDetail::find($id)->delete();
        
        return back()->with(['message' => 'Team details Deleted !', 'alert-type' => 'error']);
    }
}
