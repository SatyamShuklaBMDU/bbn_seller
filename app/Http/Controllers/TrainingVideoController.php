<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingVideo;
use App\Models\TrainingVideoFor;


class TrainingVideoController extends Controller
{
    public function index(){
        $videos =TrainingVideo::all();
        $sections = TrainingVideoFor::all();
        return view('dashboard.training-videos.trainingvideos',compact('sections','videos'));
    }
}
