<?php

namespace App\Http\Controllers\Client\Training;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Training;

class ClientTrainingController extends Controller
{
    public function index($course)
    {
        $training = Training::where(['status' => 1, 'heading' => $course])->first();
        
        return view('/client/training/training', compact('training'));
    }
}
