<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function showFormLogin()
    {
        return view('login');
    }

    function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $data = [
            'email' => $username,
            'password' => $password
        ];

        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            return redirect()->route('user.index');
        }
        return redirect()->route('login');

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
