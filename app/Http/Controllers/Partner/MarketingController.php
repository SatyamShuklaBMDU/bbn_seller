<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\MarketingAsset;
use Illuminate\Http\Request;

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
        return view('partner.dashboard.marketing_media', compact('logo', 'standee', 'banner', 'qrcode','certificate','agreement','recruitment','idcard','visiting','socialmedia','invite','mmm'));
    }
}
