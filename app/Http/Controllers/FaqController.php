<?php

namespace App\Http\Controllers;

use App\Models\faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = faq::all();
        return view('dashboard.faq',compact('faqs'));
    }
}
