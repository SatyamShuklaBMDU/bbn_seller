<?php

namespace App\Http\Controllers;

use App\Models\MarketingAsset;
use Illuminate\Http\Request;
use App\Models\BanckwiseEligibility;
use App\Models\Loan;
use App\Models\MarketingMaterial;

class MarketingController extends Controller
{
    public function index()
    {     

        $logo = MarketingAsset::where('for', 'logo')->first();
        $standee = MarketingAsset::where('for', 'standee')->first();
        $banner = MarketingAsset::where('for', 'banner')->first();
        $qrcode = MarketingAsset::where('for', 'qrcode')->first();
        $certificate = MarketingAsset::where('for', 'certificate')->first();
        $agreement = MarketingAsset::where('for', 'agreement')->first();
        $recruitment = MarketingAsset::where('for', 'recruitment')->first(); 
        $idcard = MarketingAsset::where('for', 'idcard')->first(); 
        $visiting = MarketingAsset::where('for', 'visiting')->first(); 
        $socialmedia = MarketingAsset::where('for', 'socialmedia')->get(); 
        $invite = MarketingAsset::where('for', 'invite')->get(); 
        $mmm = MarketingAsset::where('for', 'mmm')->get(); 
        $banks = BanckwiseEligibility::all();
        $loans = Loan::where('is_active',0)->get();
        return view('dashboard.market_media', compact('logo', 'standee', 'banner', 'qrcode','certificate','agreement','recruitment','idcard','visiting','socialmedia','invite','mmm','loans','banks'));
    }
    public function getBanksByProduct($product_id)
    {
        $eligibilities = BanckwiseEligibility::where('product_id', $product_id)->get();
        return response()->json($eligibilities);
    }
    public function getMarketingMaterials(Request $request)
    {
        $productId = $request->product_id;
        $bankId = $request->bank_id;

        $marketingMaterials = MarketingMaterial::where('product_id', $productId)
            ->where('bank_id', $bankId)
            ->get();

        return response()->json(['marketingMaterials' => $marketingMaterials]);
    }
}
