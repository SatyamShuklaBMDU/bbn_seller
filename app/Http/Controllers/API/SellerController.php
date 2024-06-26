<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class SellerController extends Controller
{
    public function login(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'email' => 'required|email|exists:sellers,email',
            'password' => 'required|string',
        ]);
        if ($validated->fails()) {
            return response()->json(['error' => $validated->messages()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $credentials = $request->only(['email', 'password']);
        if (Auth::guard('web')->attempt($credentials)) {
            $user = Auth::guard('web')->user();
            $loggedinUser = Seller::where('is_logged_in', true)->where('email', $user->email)->first();
            if ($loggedinUser && $loggedinUser->id === $user->id) {
                $temptoken = bin2hex(random_bytes(16));
                $loggedinUser->temp_token = $temptoken;
                $loggedinUser->temp_id = $user->id;
                $loggedinUser->save();
                return response()->json([
                    'message' => 'Another user is logged in with this phone number. Would you like to log them out and continue?',
                    'confirmation_required' => true,
                    'user_id' => $user->id,
                    'temp_token' => $temptoken,
                ], Response::HTTP_FORBIDDEN);
            }
            $user->tokens()->delete();
            $user->is_logged_in = true;
            $user->save();
            $token = $user->createToken('seller_token')->plainTextToken;
            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
                'message' => 'Login Successfully',
            ]);
        }
        return response()->json(['error' => 'Invalid Credentials'], Response::HTTP_UNAUTHORIZED);
    }
    public function forceLogin(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer|exists:sellers,id',
            'temp_token' => 'required|string',
        ]);
        $userToLogin = Seller::find($request->user_id);
        $loggedInUser = Seller::where('is_logged_in', true)
            ->where('email', $userToLogin->email)
            ->orderBy('created_at', 'desc')
            ->first();
        if ($loggedInUser && $loggedInUser->id !== $request->user_id) {
            if ($loggedInUser->temp_token === $request->temp_token && $loggedInUser->temp_id === $userToLogin->id) {
                $loggedInUser->is_logged_in = false;
                $loggedInUser->tokens()->delete();
                $loggedInUser->save();
                $userToLogin->tokens()->delete();
                $userToLogin->is_logged_in = true;
                $userToLogin->save();
                $token = $userToLogin->createToken('seller_token')->plainTextToken;
                $userToLogin->temp_token = null;
                $userToLogin->temp_id = null;
                $userToLogin->save();
                return response()->json([
                    'message' => 'Previous user logged out. Login successful.',
                    'access_token' => $token,
                    'token_type' => 'Bearer',
                ]);
            } else {
                return response()->json(['error' => 'Another user is already logged in.'], 403);
            }
        }
        $userToLogout = Seller::find($request->user_id);
        if ($userToLogout) {
            $userToLogout->is_logged_in = false;
            $userToLogout->tokens()->delete();
            $userToLogout->save();
        }
        $user = Seller::find($userToLogin->temp_user_id);
        $user->tokens()->delete();
        $user->is_logged_in = true;
        $user->save();
        $token = $user->createToken('seller_token')->plainTextToken;
        $userToLogin->temp_token = null;
        $userToLogin->temp_user_id = null;
        $userToLogin->save();
        return response()->json([
            'message' => 'Previous user logged out. Login successful.',
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
    
    public function logout(Request $request)
    {
        $user = Auth::guard('web')->user();
        $user->is_logged_in = false;
        $user->tokens()->delete();
        $user->save();
        Auth::guard('web')->logout();
        return response()->json(['message' => 'Logged Out Successfully']);
    }
}
