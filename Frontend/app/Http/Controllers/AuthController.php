<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;



class AuthController extends Controller
{

    public function register(Request $request)
    {
        $username = $request->input('username');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));

        $request->validate([
            'username' => 'required|min:3|max:12',
            'email' => 'required|email',
            'password' => [
                'required',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()
            ]
        ]);

        User::create([
            'username' => $username,
            'email' => $email,
            'password' => $password
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Successful Register'
        ]);
    }
}
