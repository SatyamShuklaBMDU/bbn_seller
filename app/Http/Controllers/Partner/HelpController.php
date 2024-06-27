<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\Help;
use Illuminate\Http\Request;

class HelpController extends Controller
{
    public function index()
    {
        $helps = Help::all();
        return view('partner.dashboard.help', compact('helps'));
    }
}
