<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function authenticate(Request $request) {
        $data = $request->json()->all();

        if (!array_key_exists('email', $data)) {
            return response()->json(['message' => 'Key \'email\' is no present'], 400);
        }

        if (!array_key_exists('password', $data)) {
            return response()->json(['message' => 'Key \'password\' is no present'], 400);
        }

        $user = User::where('email', $data['email'])->first();

        if (!$user) {
            return response()->json(['message' => 'Invalid credentials'], 400);
        }

        if (Hash::check($data['password'], $user->password)) {
            if ($user->token) {
                return response()->json(['token' => $user->token]);
            } 
            
            $user->token = str_random(64);
            $user->save();

            return response()->json(['token' => $user->token]);
        }
        else {
            return response()->json(['message' => 'Invalid credentials'], 400);
        }
    }
}
