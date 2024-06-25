<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadRequest;
use App\Models\Loan;
use App\Models\ProductType;
use App\Models\SellerLead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index()
    {
        return view('dashboard.leads.addlead');
    }

    public function store(LeadRequest $request)
    {
        $data = $request->validated();
        $lead_id = 'LEAD' . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
        $lead = new SellerLead([
            'lead_id' => $lead_id,
            'seller_id' => auth()->id(),
            'loan_amount' => $data['loan_amount'],
            'name' => $data['fname'] . ' ' . $data['lname'],
            'mobile_no' => $data['mobile_no'],
            'address' => $data['address'],
            'pincode' => $data['pincode'],
            'pan_card' => $data['pan_card'],
            'aadhar_card' => $data['aadhar_card'],
            'employment_type' => $data['employment_type'],
            'email' => $data['email'],
            'product_id' => $data['product_id'],
            'type_id' => $data['type_id'],
            'refrences' => $data['refrences'],
        ]);
        $lead->save();
        return redirect()->route('lead-index')->with('success', 'Lead created successfully.');
    }
    public function getProducts(Request $request)
    {
        $employmentType = $request->employment_type;
        $products = Loan::where('employment_type_loan', $employmentType)->where('is_active', 0)->get();
        return response()->json($products);
    }

    public function getTypes(Request $request)
    {
        $productId = $request->product_id;
        $types = ProductType::where('product_id', $productId)->where('status', 1)->get();
        return response()->json($types);
    }

    public function getLeads()
    {
        $sellers = SellerLead::where('seller_id', auth()->id())->latest()->get();
        return view('dashboard.leads.alllead', compact('sellers'));
    }
}
