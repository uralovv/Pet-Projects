<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $attr = $this->validateLogin($request);

        if (!Auth::attempt($attr)) {
            return $this->error('Credentials mismatch', 401);
        }

        return $this->token($this->getPersonalAccessToken());
    }

    public function signup(Request $request)
    {
        $attr = $this->validateSignup($request);

        User::create([
            'name' => $attr['name'],
            'email' => $attr['email'],
            'password' => Hash::make($attr['password'])
        ]);

        Auth::attempt(['email' => $attr['email'], 'password' => $attr['password']]);

        return $this->token($this->getPersonalAccessToken(), 'User Created', 201);
    }

    public function user()
    {
        return $this->success(Auth::user());
    }

    public function logout()
    {
        Auth::user()->token()->revoke();
        return $this->success('User Logged Out', 200);
    }

    public function getPersonalAccessToken()
    {
        if (request()->remember_me === 'true')
            Passport::personalAccessTokensExpireIn(now()->addDays(15));

        return Auth::user()->createToken('Personal Access Token');
    }

    public function validateLogin($request)
    {
        return $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);
    }

    public function validateSignup($request)
    {
        return $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
}
