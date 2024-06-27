<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use App\Models\SellerLead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SellerController extends Controller
{
    public function index()
    {
        $creator = auth()->guard('partner')->user();
        $sellers = Seller::where('created_by_id', $creator->id)
            ->where('created_by_type', get_class($creator))
            ->latest()
            ->get();
        return view('partner.seller.index', compact('sellers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:sellers,email',
            'password' => 'required|string',
        ]);
        $creator = auth()->guard('partner')->user();
        $seller = Seller::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'seller_id' => Seller::generateUniqueCode(),
            'created_by_id' => $creator->id,
            'created_by_type' => get_class($creator),
        ]);
        return back()->with('success', 'Seller created successfully');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:sellers,email,' . $id,
            'password' => 'sometimes|string',
        ]);
        $seller = Seller::findOrFail($id);
        $seller->name = $request->name;
        $seller->email = $request->email;
        $seller->save();
        return back()->with('success', 'Seller updated successfully');
    }

    public function destroy($id)
    {
        $seller = Seller::findOrFail($id);
        $seller->delete();
        return response()->json(true);
    }
    public function getLeads($id)
    {
        $Did = decrypt($id);
        $sellers = SellerLead::where('seller_id', $Did)->latest()->get();
        return view('partner.seller.alllead', compact('sellers'));
    }

}
