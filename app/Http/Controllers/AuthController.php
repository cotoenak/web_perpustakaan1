<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        if(Auth::check()) {
            return redirect()->route('books.index');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credentials, $request->boolean('remember'))){
            $request -> session()->regenerate();
            return redirect()->intended(route('books.index'))->with('succes', 'Selamat Datang!' .Auth::user()->name. '|');
        }

        return back()->withErrors([
            'email' => 'Email atau passwor salah.'
        ])->onlyInput('email');
    }

    public function showRegister()
    {
        if(Auth::check()) {
            return redirect()->route('books.index');
        }

        return view('auth.register');
    }

    public function regiter(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:225'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:6', 'confirmed']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        Auth::login($user);
        $request >session()->regenerate();

        return redirect()->route('books.index')->with('succes', 'Akun berhasil dibuat! Selamat datang,' . $user->name.'|');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('books.index')->with('succes', 'Berhasil Logout.');
    }
    
}
