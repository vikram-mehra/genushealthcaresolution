<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Header;
use App\Models\CompanyDetail;
use App\Models\Client;
use Image;

class HomePageController extends Controller
{
    // Header
    public function headerIndex()
    {
        $headers = Header::get();

        return view('admin/homepage/header', compact('headers'));
    }

    public function headerStore(Request $req)
    {
        $req->validate([
            'heading' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $inputArr = $req->except('_token');
        // Saving Image
        $inputArr['status'] = (! isset($req->status)) ? 0 : 1;
        $inputArr['photo'] = $this->saveImage($req->file('photo'), 'header/1400x729', '1400', '729');
        Header::create($inputArr);

        return redirect(url("admin/header"))->with(['message' => 'Header details added !', 'alert-type' => 'success']);
    }

    public function headerEdit (Request $req, $id)
    {
        $header = Header::find($id);

        if($req->isMethod('post')) {
            $req->validate([
                'heading' => 'required',
                'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            $UpdateArr = $req->except('_token');
            $UpdateArr['status'] = (! isset($req->status)) ? 0 : 1;
            if($req->file('photo')) {
                $UpdateArr['photo'] = $this->saveImage($req->file('photo'), 'header/1400x729', '1400', '729');
            }

            $header->update($UpdateArr);

            return redirect(url("admin/header"))->with(['message' => 'Header Updated !', 'alert-type' => 'success']);
        } else {
            return view('admin/homepage/header', compact('header', 'id'));
        }
    }

    public function headerDelete($id)
    {
        Header::find($id)->delete();
        
        return back()->with(['message' => 'Header record Deleted !', 'alert-type' => 'error']);
    }

    // Comapny
    public function companyIndex()
    {
        $companyDetails = CompanyDetail::get();

        return view('admin/homepage/company', compact('companyDetails'));
    }

    public function companyStore(Request $req)
    {
        $req->validate([
            'title' => 'required',
            'content' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $inputArr = $req->except('_token');
        // Saving Image
        $inputArr['status'] = (! isset($req->status)) ? 0 : 1;
        $inputArr['photo'] = $this->saveImage($req->file('photo'), 'company/636x460', '636', '460');
        CompanyDetail::create($inputArr);

        return redirect(url("admin/company-details"))->with(['message' => 'Company details added !', 'alert-type' => 'success']);
    }

    public function companyEdit (Request $req, $id)
    {
        $company = CompanyDetail::find($id);

        if($req->isMethod('post')) {
            $req->validate([
                'title' => 'required',
                'content' => 'required',
                'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            $UpdateArr = $req->except('_token');
            $UpdateArr['status'] = (! isset($req->status)) ? 0 : 1;
            if($req->file('photo')) {
                $UpdateArr['photo'] = $this->saveImage($req->file('photo'), 'company/636x460', '636', '460');
            }

            $company->update($UpdateArr);

            return redirect(url("admin/company-details"))->with(['message' => 'Company details Updated !', 'alert-type' => 'success']);
        } else {
            return view('admin/homepage/company', compact('company', 'id'));
        }
    }

    public function companyDelete($id)
    {
        CompanyDetail::find($id)->delete();
        
        return back()->with(['message' => 'Company details record Deleted !', 'alert-type' => 'error']);
    }

    // Client
    public function clientIndex()
    {
        $clients = Client::get();

        return view('admin/homepage/client', compact('clients'));
    }

    public function clientStore(Request $req)
    {
        $req->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $inputArr = $req->except('_token');
        // Saving Image
        $inputArr['status'] = (! isset($req->status)) ? 0 : 1;
        $inputArr['photo'] = $this->saveImage($req->file('photo'), 'client/168x88', '168', '88');
        Client::create($inputArr);

        return redirect(url("admin/clients"))->with(['message' => 'Client details added !', 'alert-type' => 'success']);
    }

    public function clientEdit (Request $req, $id)
    {
        $client = Client::find($id);

        if($req->isMethod('post')) {
            $req->validate([
                'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            $UpdateArr = $req->except('_token');
            $UpdateArr['status'] = (! isset($req->status)) ? 0 : 1;

            if($req->file('photo')) {
                $UpdateArr['photo'] = $this->saveImage($req->file('photo'), 'client/168x88', '168', '88');
            }

            $client->update($UpdateArr);

            return redirect(url("admin/clients"))->with(['message' => 'Client details Updated !', 'alert-type' => 'success']);
        } else {
            return view('admin/homepage/client', compact('client', 'id'));
        }
    }

    public function clientDelete($id)
    {
        Client::find($id)->delete();
        
        return back()->with(['message' => 'Company details record Deleted !', 'alert-type' => 'error']);
    }

    // Client

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
