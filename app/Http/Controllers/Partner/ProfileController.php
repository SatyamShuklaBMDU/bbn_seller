<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->guard('partner')->user();
        return view('partner.profile.edit', compact('user'));
    }
    public function saveProfile(Request $request)
    {
        $request->validate([
            'image' => 'sometimes|image|max:2048',
        ]);
        $user = auth()->guard('partner')->user();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('PartnerImages'), $imageName);
            $imageUrl = 'PartnerImages/' . $imageName;
            $user->profile_pic = $imageUrl;
            $user->save();
        }
        return redirect()->back()->with('success', 'Profile picture updated successfully');
    }
    public function updateProfile(Request $request)
    {
        $user = auth()->guard('partner')->user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:partners,id,' . $user->id,
            'phone_number' => 'required|integer|min:20',
            'state' => 'sometimes|string|max:255',
            'city' => 'sometimes|string|max:255',
            'pincode' => 'sometimes|numeric|min:10',
            'gender' => 'sometimes|in:male,female,other',
        ]);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        $user->state = $request->input('state');
        $user->city = $request->input('city');
        $user->pincode = $request->input('pincode');
        $user->gender = $request->input('gender');
        $user->save();
        return redirect()->back()->with('success', 'Profile updated successfully');
    }

}
