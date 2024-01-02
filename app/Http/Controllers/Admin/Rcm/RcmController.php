<?php

namespace App\Http\Controllers\Admin\Rcm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rcm;

class RcmController extends Controller
{
    public function index() 
    {
        $rcm = Rcm::first();
        return view('/admin/rcm/rcm', compact('rcm'));
    }

    public function update(Request $req)
    {
        $req->validate([
            'content' => 'required'
        ]);
        $data['content'] = $req->content;
        
        if(! isset($req->status)) {
            $data['status'] = 0;
        } else {
            $data['status'] = 1;
        }

        Rcm::find($req->id)->update($data);

        return redirect(url("admin/rcm/"))->with(['message' => 'Rcm content updated!', 'alert-type' => 'success']);
    }
}
