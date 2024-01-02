<?php

namespace App\Http\Controllers\Client\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientContactControllers extends Controller
{
    public function Index(){
        return view('/client/contactus/contact');
    }
}
