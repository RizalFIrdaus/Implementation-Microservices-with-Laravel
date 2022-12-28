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
        $request->validate([
            'username' => 'required|min:3|max:12|unique:users',
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
        $register = User::create([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);
        return response()->success($register, 'Successful Register', 200);
    }

    public function login(Request $request)
    {
        $user = User::where('username', $request->input('username'))->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('api_token');
                return response()->success($token->plainTextToken, 'Successful Login', 200);
            } else {
                return response()->error('Password not match', 400);
            }
        } else {
            return response()->error('Username not found!', 400);
        }
    }
    public function logout(Request $request)
    {
        try {
            $request->user()->tokens()->delete();
            return response()->success($request->user(), 'Successful Logout', 200);
        } catch (\Throwable $e) {
            return response()->error('Unauthorized', 403);
        }
    }
}
