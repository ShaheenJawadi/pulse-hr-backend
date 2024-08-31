<?php

namespace App\Http\Controllers;

use App\Utils\ApiResponse;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {

            $token = $user->createToken('accessToken')->accessToken;

            $userData = [
                'token' => $token,
                'user' => $user, 
            ];
    
            return ApiResponse::success($userData, 'success');

            return response()->json(['message' => $token]);
        } else {
            return ApiResponse::error('Les identifiants sont incorrects.');
        }
    }
}
