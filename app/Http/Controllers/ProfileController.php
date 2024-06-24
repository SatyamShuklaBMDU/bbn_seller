<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function saveData(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:sellers,id,' . Auth::id(),
            'phone_number' => 'required|integer|min:20',
            'state' => 'sometimes|string|max:255',
            'city' => 'sometimes|string|max:255',
            'pincode' => 'sometimes|numeric|min:10',
            'gender' => 'sometimes|in:male,female,other',
        ]);
        $user = Auth::user();
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

    public function saveProfile(Request $request)
    {
        $request->validate([
            'image' => 'sometimes|image|max:2048',
        ]);
        $user = Auth::user();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('SellerImages'), $imageName);
            $imageUrl = 'SellerImages/' . $imageName;
            $user->profile_pic = $imageUrl;
            $user->save();
        }
        return redirect()->back()->with('success', 'Profile picture updated successfully');
    }
}
