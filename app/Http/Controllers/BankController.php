<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BankController extends Controller
{
    public function storeBank(Request $request)
    {
        $request->validate([
            'bank_name' => 'required|string',
            'branch_name' => 'required|string',
            'ifsc_code' => 'required|string',
            'account_number' => 'required|string',
            'holder_name' => 'required|string',
        ]);
        $user = auth()->user();
        $data = $user->bank()->updateOrCreate([
            'seller_id' => $user->id,
        ], [
            'bank_name' => $request->input('bank_name'),
            'branch_name' => $request->input('branch_name'),
            'ifsc_code' => $request->input('ifsc_code'),
            'account_number' => $request->input('account_number'),
            'account_holder_name' => $request->input('holder_name'),
        ]);
        return back()->with('success', 'Bank Details Updated Successfully.');
    }

    public function storeKYC(Request $request)
    {
        $request->validate([
            'pan_number' => 'required|string',
            'gst_number' => 'required|string',
        ]);
        $user = auth()->user();
        $data = $user->bank()->updateOrCreate([
            'seller_id' => $user->id,
        ], [
            'pan_name' => $request->input('pan_number'),
            'gst_number' => $request->input('gst_number'),
        ]);
        return back()->with('success', 'KYC Details Updated Successfully.');
    }
}
