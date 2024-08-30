<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class TestController extends Controller
{
    //

    public function login(Request $request)
    {
        
        $user = User::where('email', $request->email)->first();
      
     
         
        $token = $user->createToken('accessTocken')->accessToken;
        return response()->json(['message' => $token]);
    }
}
