<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function Index(Request $req){

    	$CompanyList = Company::orderBy('name', 'ASC')->paginate(10); 
    	$data['CompanyList'] = compact('CompanyList');
    	$data['singleData'] = '';

    	if($req->isMethod('post')){
    		$req->validate([
                'name' => 'required',
            ]);

            
              if(Company::where(['name' => $req->name])->exists()) {
               	 return back()->with(['message' => 'Already added for this company!', 'alert-type' => 'error']);
	            } else {
	            	if($req->company_id){
	            		Company::whereId($req->company_id)->update(['name'=>$req->name]);
	            		return redirect('admin/company')->with(['message' => 'Company is Updated!', 'alert-type' => 'success']);
	            	}else{
	            		 Company::create(['name'=>$req->name]);
	            		 return back()->with(['message' => 'Company is Created!', 'alert-type' => 'success']);
	            	}
	               
	            }
    	}
    	return view('admin/company/company',$data);

    }
    public function destroy($id){
    	Company::where(['id' => $id])->delete();
    	return back()->with(['message' => 'Company is Deleted !', 'alert-type' => 'error']);
    }

    public function getSingaleData($id){
    	$data['CompanyList'] = [];
    	$data['singleData'] = Company::where(['id' => $id])->first();
    	return view('admin/company/company',$data);
    }
}
