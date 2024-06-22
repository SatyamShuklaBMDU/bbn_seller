<?php

namespace App\Http\Controllers;

use App\Models\Help;
use Illuminate\Http\Request;

class HelpController extends Controller
{
    public function index()
    {
        $helps = Help::all();
        return view('dashboard.help', compact('helps'));
    }
}
